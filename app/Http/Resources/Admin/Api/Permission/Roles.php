<?php

namespace App\Http\Resources\Admin\Api\Permission;

use Illuminate\Http\Resources\Json\JsonResource;

class Roles extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
