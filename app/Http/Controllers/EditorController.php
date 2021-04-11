<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Process\InputStream;


class EditorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role != "سر دبیر") {
                return redirect('login')->send();
            }
            return $next($request);
        });
    }

    public function CheckPosts()
    {
        $posts = Post::get();
        return view('Editor.Checker', ['posts' => $posts]);
    }

    public function ChangePostState(Request $request)
    {
        $postId = $request->postId;
        $post = Post::where('id', '=', $postId)->first();
        if ($post->isActive == 1) {
            $post->update(['isActive' => false]);
            return 0;
        } else {
            $post->update(['isActive' => true]);
            return 1;
        }
    }

    public function changeEditorState(Request $request){
        $postId = $request->postId;
        $post = Post::where('id', '=', $postId)->first();
        if ($post->isSelectByEditor == 1) {
            $post->update(['isSelectByEditor' => false]);
            return 0;
        } else {
            $post->update(['isSelectByEditor' => true]);
            return 1;
        }
    }
    public function CreateCategory()
    {
        $categories = Category::get();
        return view('Editor.CategoryCreate', ['cat' => $categories]);
    }

    public function CreateCategoryPost(Request $request)
    {
        $exist=Category::where('catName','=',$request['CatName'])->exists();
        if($exist==true)
        {
            return view('bases.error',['error'=>"این دسته بندی تکراری است"]);
        }
        Category::create([
            'catName' => $request['CatName']
        ]);
        return redirect()->route('Editor.CategoryCreate');
    }
}
