<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail(Post $post)
 */
class Post extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function setPostImageAttribute($val){
//        $this->attributes['post_image'] = asset('posts/'.$val);

        $this->attributes['post_image']= public_path('images/posts'.$val);
//        $image = Storage::disk('local')->get('public/avatars/'.$gravatar.'.jpg');
//        return new Response($image, 200);

    }

    public function getPostImageAttribute($val){
        return asset('posts/'.$val);
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

}
