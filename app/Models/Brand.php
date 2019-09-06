<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $guarded=[];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
