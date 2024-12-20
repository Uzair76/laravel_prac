<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function houses(){
        return $this->belongsToMany(House::class,'user_houses');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
