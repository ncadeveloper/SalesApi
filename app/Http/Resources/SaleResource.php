<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
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
         'id'=> $this->id,
         'name' => $this->seller->name,
         'email' => $this->seller->email,
         'commission' => $this->commission_value,
         'price' => $this->price,
         'date' => $this->created_at->format('d-m-Y')
        ];
    }
}
