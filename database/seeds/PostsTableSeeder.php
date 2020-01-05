<?php

use App\Category;
use App\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
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
          'slug'  => 'news'

    	]);

    	$category2 = Category::create([
    			'name'	=> 'Marketing',
          'slug'  => 'marketing'
    	]);

    	$category3 = Category::create([
    			'name'	=> 'Partnership',
          'slug'  => 'partnership'
    	]);

       $post1 = Post::create([
       		'title' => 'We relocated our office to a new designed garage',
       		'slug'  => str_slug('We relocated our office to a new designed garage'),
       		'description' => 'We relocated our office to a new designed garage',
       		'category_id' => $category1->id,
       		'image'		=> '1.jpg',
          'author'  => 'Ashish Mainali'
       ]);

        $post2 = Post::create([
       		'title' => 'Top 5 brilliant content marketing strategies',
       		'slug'  => str_slug('Top 5 brilliant content marketing strategies'),
       		'description' => 'We relocated our office to a new designed garage',
       		'category_id' => $category2->id,
       		 'image'		=> '2.jpg',
           'author'   => 'Shweta Siwakoti'
       ]);


        $post3 = Post::create([
       		'title' => 'Best practices for minimalist design with example',
       		'slug'  => str_slug('Best practices for minimalist design with example'),
       		'description' => 'We relocated our office to a new designed garage',
       		'category_id' => $category3->id,
           	'image'		=> '3.jpg',
            'author' => 'Ashish Khadka'
       ]);

        $post4 = Post::create([
       		'title' => 'Congratulate and thank to Maryam for joining our team',
       		'slug'  => str_slug('Congratulate and thank to Maryam for joining our team'),
       		'description' => 'We relocated our office to a new designed garage',
       		'category_id' => $category2->id,
       		'image'		=> '4.jpg',
            'author' => 'Ashish Khadka'
       ]);

    }
}
