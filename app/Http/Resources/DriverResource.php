<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
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
            'drivers_license' => $this->drivers_license,
            'phil_health' => $this->phil_health,
            'sss' => $this->sss,
            'pag_ibig' => $this->pag_ibig,
            'salary_id' => SalaryResource::collection($this->salary()->get())
        ];
    }
}
