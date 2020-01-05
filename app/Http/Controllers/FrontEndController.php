<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use App\Visitor;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function __construct()
    {
      $model = new Visitor;
      $ip = $_SERVER['REMOTE_ADDR'];
      $result = $model->where('ip', $ip)->value('ip');
      if($ip != $result)
      {
        $model->ip = $ip;
        $model->save();
      }
    }

    public function index()
    {
    	return view('vatiz-front.home')
    		-> with('posts', Post::oldest()->paginate(3));
    }

    public function about()
    {
    	return view('vatiz-front.about')->with('setting', Setting::first());
    }

    public function single($slug)
    {
    	$post = Post::where('slug', $slug)->first();
    	return view('vatiz-front.single')->with('post', $post);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('vatiz-front.category')->with('category', $category);
    }

}
