<?php

namespace App\Http\Resources;

use App\Models\MemberDetails;
use App\Models\MembershipType;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MemberCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'tax_identification_number' => $this->tax_identification_number,
            'details' => DetailResource::collection($this->details()->get()),
            'profile' => ProfileResource::collection($this->profile()->get())
        ];
    }
}
