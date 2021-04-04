<?php

namespace App\Http\Controllers;

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

    public function createArticle(Request $request)
    {
        $inputs = $request->all();
        return $request;
    }
}
