<?php

namespace App\Providers;

use App\Category;
use App\Post;
use App\Setting;
use App\Visitor;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
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
        View::composer('vatiz-front.layouts.nav', function($view){
            $view->with('categories', Category::take(3)->orderBy('created_at', 'desc')->get())
                ->with('settings', Setting::first());
        });
        View::composer('vatiz-front.layouts.right-nav', function($view){
            $view->with('posts', Post::take(5)->orderBy('created_at', 'desc')->get())
                ->with('categories', Category::oldest()->paginate(7));
        });

        View::composer('vatiz-back.layouts.back-header', function($view){
            $view->with('visitors', Visitor::get());
        });
    }
}
