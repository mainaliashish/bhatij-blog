<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    public $path = '/uploads/posts/';

	use SoftDeletes;

    protected $dates = ['deleted_at', 'published_at'];

	protected $fillable = [
        'title',
		'description',
		'slug',
        'image',
        'category_id',
        'author'
    ];

	public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageAttribute($value){
        return $this->path . $value;
    }

    public function uploadImage($image)
    {
        $img = strtolower(preg_replace('/\s+/','-',$image -> getClientOriginalName()));
        $time = strtolower(preg_replace('/\s+/','-', time()));
        $name =  $time .'-'. $img ;

        $image->move('uploads/posts/', $name);

        return $name;
    }

    public function deleteImage($image)
    {
        $root = realpath($_SERVER['DOCUMENT_ROOT']);
        $post_image = $root . $image;
        if(unlink($post_image)){
            return true;
        }
        return false;
    }
}

