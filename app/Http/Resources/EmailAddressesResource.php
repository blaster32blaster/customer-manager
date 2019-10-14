<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class EmailAddressesResource
 * @package App\Http\Resources
 */
class EmailAddressesResource extends ResourceCollection
{
    /**
     * @var string $collects
     */
    public $collects = '\App\Http\Resources\EmailAddressResource';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
