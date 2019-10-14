<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class CustomerResource
 * @package App\Http\Resources
 */
class CustomerResource extends JsonResource
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
          'addresses' => new AddressesResource($this->addresses),
          'emails' => new EmailAddressesResource($this->emailAddresses),
        ];
    }
}
