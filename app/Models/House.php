<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class House extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function user(){
        return $this->belongsToMany(User::class,'user_houses');
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
