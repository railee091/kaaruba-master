<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'date_accepted' => $this->date_accepted,
            'resolution_number' => $this->resolution_number,
            'membership_type' => TypeResource::collection($this->types()->get())
        ];
    }
}
