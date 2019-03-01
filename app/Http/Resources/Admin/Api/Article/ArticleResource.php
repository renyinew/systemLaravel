<?php

namespace App\Http\Resources\Admin\Api\Article;

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
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'status' => $this->status,
            'hot' => $this->hot,
            'top' => $this->top,
            'browse' => $this->browse,
            'created_at' => $this->created_at,
        ];
    }
}
