<?php

namespace App\Http\Resources;

use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type'          => 'articles',
            'id'            => (string)$this->id,
            'attributes'    => [
                'title' => $this->title,
                'thumbnail' => $this->thumbnail,
                'content' => $this->content,
                'author' => User::find($this->user_id),
            ],

        ];
    }
}
