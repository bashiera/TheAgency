<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'link',
        "image",
        "category_id",
        "user_id"

    ];


    //one post on portofolio has only one category

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class);
    }


}
