<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vatiz-back.categories.index')
        		->with('categories', Category::latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vatiz-back.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['name']);
        $data['slug'] = str_slug($request->name);

       $this -> validate($request, [
            'name'   => 'required|unique:categories'
       ]);

        $result = Category::create($data);
        if($result) {
            session()->flash('success', 'Category Created Successfully!');
        } else {
            session()->flash('error', 'Something went wrong.');
        }

        return redirect() -> route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('vatiz-back.categories.show')
                    ->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit') -> with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only(['name']);
        $data['slug'] = str_slug($request->name);

        $this -> validate($request, [
            'name'   => 'required'
       	]);

         $result = $category->update($data);

         if($result) {
           session()->flash('status', 'Category Updated Successfully!');
         } else {
           session()->flash('error', 'Something went wrong.');
         }

         return redirect() -> route('categories.index') ;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        foreach ($category->posts as $post) {
            $post -> delete();
        }
        $result = $category->delete();

         if($result) {
           session()->flash('success', 'Category Deleted Successfully!');
         } else {
           session()->flash('error', 'Something went wrong.');
         }

         return redirect() -> route('categories.index') ;
    }
}
