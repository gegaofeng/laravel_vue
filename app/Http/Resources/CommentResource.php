<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class CommentResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
                return parent::toArray($request);
//        return [
//            'type'       => 'comment',
//            'attributes' => [
//                'user_id' => (string)$this->id,
//                'content' => $this->content,
//            ]
//        ];
    }
}
