<?php

namespace App\Providers;
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
        View::composer('*',function($view){
           $posts= Post::orderBy('created_at', 'DESC')->take(5)->get();
            $view->with('last_posts',$posts);
        });
    }
}
