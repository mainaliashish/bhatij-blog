<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vatiz-back.posts.index')->with('posts', Post::latest()->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories      = Category::pluck('name', 'id') -> all();
       if(!$categories){
            Session::flash('info', 'You must create a category and tag before attempting to create a post!');
            return redirect() -> route('posts.index');
        }
        return view('vatiz-back.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $model = new Post;
        $input = $request->all();

        $image = $request->file('image');

        $input['slug'] = str_slug($input['title']);
        $input['author'] = 'Bhatij';
        $string = preg_replace('/<div[^>]+\>/i', "", $string);
        if($image) {
            $input['image'] = $model->uploadImage($image);
        }
        $post = Post::create($input);

        if($post) {
           session()->flash('success', 'Post Created Successfully!');
        } else {
           session()->flash('error', 'Something went wrong.');
        }

        return redirect() -> route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('vatiz-back.posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories      = Category::pluck('name', 'id')->all();
        return view('vatiz-back.posts.create')
                        ->with('post', $post)
                        ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
      $input = $request->only(['title', 'category_id',  'description','image']);
      $model = new Post;

        $image = $request->file('image');

        $input['slug'] = str_slug($input['title']);
        if($image) {
            if($post->image)
            {
               $model->deleteImage($post->image);
            }
            $input['image'] = $model->uploadImage($image);

        } else {
           $name = explode("/", $post->image);
           $input['image'] = $name[3];
        }

       $input['author'] = 'Bhatij';
       $result = $post->update($input);

        if($result) {
            Session::flash('success', 'Post Updated Successfully!');
        } else {
            Session::flash('error', 'Something went wrong.');
        }

        return redirect() -> route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash($id)
    {
        $post = Post::findOrFail($id);
        $result = $post->delete();

         if($result) {
            session()->flash('success', 'Post Trashed Successfully!');
         } else {
            session()->flash('error', 'Something went wrong.');
         }
         return redirect() -> route('posts.index') ;
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()-> get();

        return view('vatiz-back.posts.trashed', compact('posts'));

    }


    public function delete($id)
    {
        $post = Post::withTrashed() -> where('id', $id) -> first();

        $result = $post->forceDelete();

         if($result) {
            Session::flash('success', 'Post Deleted permanently!');
         } else {
            Session::flash('error', 'Something went wrong.');
         }

         return redirect() -> route('posts.trashed') ;
    }


    public function restore($id)
    {
        $post = Post::withTrashed() -> where('id', $id) -> first();

        $result = $post->restore();

         if($result) {
            Session::flash('success', 'Post Successfully restored!');
         } else {
            Session::flash('error', 'Something went wrong.');
         }

         return redirect() -> route('posts.index') ;

    }
}
