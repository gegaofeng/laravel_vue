<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleCommentsResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
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
//                'user_id' => (string)$this->user_id,
//                'content' => $this->content,
//            ]
//        ];
    }
}
