<?php

namespace App\Http\Resources;

use function foo\func;
use Illuminate\Http\Resources\Json\Resource;

class ArticleResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
//    public function toArray($request)
//    {
//        return parent::toArray($request);
//    }
    public function toArray($request)
    {
//        $comments=$this->comments;
//        foreach ($comments as $comment){
//            $da=json_decode(new CommentResource($comment));
//        }
        return [
            'type' => 'article',
            'id'   => (string)$this->id,
            'attributes' => [
                'title' => $this->title,
                'content' => $this->body,
            ],
//            'comments' =>json_encode($da)
            'comments' => new CommentResource($this->comments),
        ];
    }
    public function with($request)
    {
//        return parent::with($request); // TODO: Change the autogenerated stub
        return [
            'link'=>[
                'self'=>url('api/articles/'.$this->id),
            ]
        ];
    }
}
