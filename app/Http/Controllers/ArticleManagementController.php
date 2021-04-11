<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role == null) {
                return redirect('login')->send();
            }
            if (Auth::user()->role == "BaseAdmin") {
                return redirect('login')->send();
            }
            if (Auth::user()->role == "سر دبیر") {
                return redirect('login')->send();
            }
            return $next($request);
        });
    }
    public function index()
    {
        $userId = Auth::user()->id;
        $posts = Post::where('user_id', '=', $userId)->get();
        return view('ArticleManagement.index', ['posts' => $posts]);
    }

    public function delete(Request $request)
    {
        $userId = Auth::user()->id;
        $segmentCount = count($request->segments());
        $postId = $request->segment($segmentCount);
        $isTrue = Post::where('id', '=', $postId)->where('user_id', '=', $userId)->exists();

        if ($isTrue == 1) {
            $post = Post::find($postId);
            $post->delete();
        }
        return redirect()->route('ArticleManagement');
    }

    public function Create()
    {
        return view('ArticleManagement.create');
    }

    public function EditArticle(Request $request)
    {

        $userId = Auth::user()->id;
        $segmentCount = count($request->segments());
        $postId = $request->segment($segmentCount);
        $isTrue = Post::where('id', '=', $postId)->where('user_id', '=', $userId)->exists();
        if ($isTrue == false) {
            return redirect()->route('ArticleManagement');
        }

        $post = Post::find($postId);
        return view('ArticleManagement.Edit', ['post' => $post]);
    }


    public function EditArticlePost(Request $request)
    {
        $inputs = $request->all();
        if (!$request->hasFile('picture')) {
            //use prev file
            Post::where('id', '=', $inputs['id'])->update(['title' => $request['title'], 'text' => $request['text'],'isActive'=>false]);

        } else {
            $image = $request->file('picture');
            $url = $image->getClientOriginalName();
            $url = strtotime(date('Y-m-d-H:isa')) . $url;
            $image->move('img/post/', $url);
            Post::where('id', '=', $inputs['id'])->update(['picture'=>$url,'title' => $request['title'], 'text' => $request['text'],'isActive'=>false]);
        }

        return redirect()->route('ArticleManagement');
    }

    public function createArticle(Request $request)
    {
        $inputs = $request->all();
        $image = $request->file('picture');
        if (!$request->hasFile('picture')) {
            return "article should have image";
        }
        $url = $image->getClientOriginalName();
        $url = strtotime(date('Y-m-d-H:isa')) . $url;
        $image->move('img/post/', $url);
        $userId = Auth::user()->id;
        $catName = Auth::user()->role;
        $category = Category::where('catName', '=', $catName)->first();

        Post::create([
            'text' => $inputs['text'],
            'title' => $inputs['title'],
            'isActive' => false,
            'picture' => $url,
            'user_id' => $userId,
            'Category_id' => $category->id
        ]);

        return redirect()->route('ArticleManagement');
    }
}
