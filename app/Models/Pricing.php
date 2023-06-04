<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'period',
        "price",

    ];

    public function categories()
    {
        return $this->BelongsToMany(Category::class);
    }

    public function request()
    {
        return $this->hasMany(Request::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
