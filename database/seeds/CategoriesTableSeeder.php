<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$category1 = Category::create([
    			'name'	=> 'News',

    	]);

    	$category2 = Category::create([
    			'name'	=> 'Marketing',

    	]);

    	$category3 = Category::create([
    			'name'	=> 'Partnership',

    	]);

    	$category4 = Category::create([
    			'name'	=> 'Technology',

    	]);
    }
}
