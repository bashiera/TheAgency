<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;
    public function category_pricing()
    {
        return $this->BelongsToMany(Category::class);
    }

    public function request()
    {
        return $this->hasMany(Request::class);
    }

}
