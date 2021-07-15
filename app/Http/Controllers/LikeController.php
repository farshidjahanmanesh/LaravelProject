<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function saveLike(Request $request)
    {
        $userId = Auth::user()->id;
        $postId = $request->id;
        $isLike = Like::where('Post_id', $postId)->where('User_Id', $userId)->exists();
        if ($isLike) {
            Like::where('Post_id', $postId)->where('User_Id', $userId)->delete();
        } else {
            Like::create([
                'Post_id' => $postId,
                'User_Id' => $userId
            ]);
        }
        $likeCount = Like::where('Post_id', $postId)->count();
        return $likeCount;
    }
}
