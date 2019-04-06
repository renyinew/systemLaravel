<?php

namespace App\Http\Resources\Admin\Api\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'avatar' => $this->avatar,
            'email' => $this->email,
            'phone' => $this->phone,
            'amount' => $this->amount,
            'level' => $this->level == 1 ? '后台' : '前台',
            'status' => $this->status == 1 ? '正常' : '封禁',
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
