<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $guarded=[];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
