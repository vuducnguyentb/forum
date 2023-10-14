<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function discussions(){
        return $this->hasMany(Discussion::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
