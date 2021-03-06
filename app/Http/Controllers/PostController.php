<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function index(Request $request)
    {
        $pageNumber = 0;
        if ($request->has('pageNumber')) {
            $pageNumber = $request->input('pageNumber') * 5;
        }
        $postsCount = Post::where('isActive', '=', true)->count();
        $maxPageCount = $postsCount / 5;
        $posts = Post::where('isActive', '=', true)->orderBy('created_at', 'DESC')->skip($pageNumber)->take(5)->get();

        return view('bases.index', ['posts' => $posts, 'pageNumber' => $request->input('pageNumber'), 'pageCount' => $maxPageCount]);
    }

    public function post(Request $request)
    {
        $segmentCount = count($request->segments());
        $postId = $request->segment($segmentCount);
        if (!is_numeric($postId)) {
            return "invalid input";
        }
        if (Post::where('id', '=', $postId)->exists()) {
            $post = Post::find($postId);
            $comments = $post->comments;
            $user = $post->user;
            return view('bases.post', compact("post", "comments", "user"));
        } else {
            return "invalid input";
        }
    }

    public function saveComment(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'postId' => 'required | integer',
            'text' => 'required'
        ]);
        Comment::create([
            'text' => $request->input('text'),
            'name' => $request->input('name'),
            'post_id' => $request->input('postId'),
            'isActive' => 1
        ]);
        return 1;
    }

    public function category(Request $request)
    {
        $segmentCount = count($request->segments());
        $catId = $request->segment($segmentCount);
        if (!is_numeric($catId)) {
            return "invalid input";
        }
        $posts = Post::where('Category_id', '=', $catId)->where('isActive', '=', true)->orderBy('created_at', 'DESC')->get();
        // $posts= Category::find($catId)->orderBy('created_at', 'DESC')->posts;
        return view('bases.category', ['posts' => $posts]);
    }
}
