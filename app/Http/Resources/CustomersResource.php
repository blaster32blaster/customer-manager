<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class CustomersResource
 * @package App\Http\Resources
 */
class CustomersResource extends ResourceCollection
{
    /**
     * @var string $collects
     */
    public $collects = '\App\Http\Resources\CustomerResource';

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
