<?php

namespace App\Http\Resources\Admin\Api\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'sort' => $this->sort,
            'type' => $this->type,
            'name' => $this->name,
            'p_id' => $this->p_id,
            'alias' => $this->alias,
            'keywords' => $this->keywords,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
