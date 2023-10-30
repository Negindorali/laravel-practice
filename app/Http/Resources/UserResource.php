<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'profile'=>$this->when($this->profile_img,fn()=>asset('/upload/'.$this->profile_img),null),
            'token'=>$this->whenHas('token',$this->token),
            'user'=>UserResource::make($this->whenLoaded('parent'))
        ];
//        return parent::toArray($request);
    }
}
