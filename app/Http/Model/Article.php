<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Article extends Model
{
    //
    protected $fillable = ['title', 'body'];
    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id','id');
    }
}
