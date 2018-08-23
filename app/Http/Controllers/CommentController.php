<?php

namespace App\Http\Controllers;

use App\Http\Model\Comment;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function index(){}
    public function show(Comment $comment){
        return new CommentResource($comment);
    }
}
