<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;

class EditerSpecialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (str_starts_with(Auth::user()->role, "سر دبیر") == false) {
                return redirect('login')->send();
            }
            return $next($request);
        });
    }

    public function index()
    {
        $userRole = Auth::user()->role;
        $categoryName = trim(str_replace("سر دبیر", '', $userRole));
        $category=Category::where('catName','=',$categoryName)->first();
        $posts = Post::where('category_id','=',$category->id)->get();
        return view('EditerSpecial.EditerSpecial', ['posts' => $posts]);
    }

    public function ChangePostState(Request $request){
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
}
