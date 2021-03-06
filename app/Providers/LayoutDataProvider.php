<?php

namespace App\Providers;

use App\Models\Category;
use View;
use Illuminate\Support\ServiceProvider;
use App\Models\Post;

class LayoutDataProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $posts = Post::where('isActive','=',true)->orderBy('created_at', 'DESC')->take(5)->get();
            $category = Category::get();
            $view->with('categories', $category);
            $view->with('last_posts', $posts);

            $editorPosts=Post::where('isSelectByEditor','=',true)->orderBy('created_at', 'DESC')->take(6)->get();
            $view->with('editorSelectedPost',$editorPosts);
        });
    }
}
