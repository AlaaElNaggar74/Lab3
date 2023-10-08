<?php

namespace App\Models;
use App\Models\category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    function category(){
        return $this->belongsTo(category::class);
    }
}
