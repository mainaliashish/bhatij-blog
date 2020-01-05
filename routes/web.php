<?php

Route::get('/', 'FrontEndController@index')->name('main-page');
Route::get('/about', 'FrontEndController@about')->name('about');
Route::get('/singlepage/{slug}', 'FrontEndController@single')->name('single');
Route::get('/category/{name}', 'FrontEndController@category')->name('category');
Route::get('/results', function(){
        $posts = \App\Post::where('title', 'like', '%' . request('query') . '%')->get();
        return  view('vatiz-front.results')->with('posts', $posts)
                    ->with('title', 'Search results for : ' . request('query'))
                    ->with('query', request('query'));
}) -> name('results');

Auth::routes(['register'=>false]);
Route::get('/register', 'FrontEndController@index');

Route::group(['middleware' => 'auth', 'prefix'=>'admin'], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/posts/trashed', 'PostsController@trashed')->name('posts.trashed');
    Route::get('/posts/trash/{id}', 'PostsController@trash')->name('posts.trash');
    Route::get('/posts/restore/{id}', 'PostsController@restore')->name('posts.restore');
    Route::get('/posts/delete/{id}', 'PostsController@delete')->name('posts.delete');
    Route::resource('posts', 'PostsController');

    Route::get('/categories/delete/{id}', 'CategoriesController@delete')->name('categories.delete');
    Route::resource('categories', 'CategoriesController');

    Route::get('/settings', 'SettingsController@index')->name('settings.index');
	Route::post('/settings/update', 'SettingsController@update') -> name('settings.update');
    Route::get('/settings/changepw', 'SettingsController@password') -> name('settings.changepw');
    Route::post('/settings/updatepassword', 'SettingsController@updatepassword') -> name('settings.updatepassword');

});
