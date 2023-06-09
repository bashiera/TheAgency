<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;



    protected $fillable = [
        'title',
        'subtitle',
        'content',
        "slug",
        "admin_id",


    ];

        //many post maybe have the same tags
        public function tags()
        {
            return $this->belongsToMany(Tag::class);
        }

    //the one image is belong to one post but one post maybe has many images
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class);
    }



}
