<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource as Resource;

class UserResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'phone' => $this->phone,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'created_at'    => $this->created_at?->format('Y-m-d H:00'),
            'updated_at'    => $this->updated_at?->format('Y-m-d H:00'),
        ];
    }
}
