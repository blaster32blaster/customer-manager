<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Response;
use App\Services\AddressService;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAddressRequest;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param $address
     * @param UpdateAddressRequest $request
     * @return Response
     */
    public function update($address, UpdateAddressRequest $request) : Response
    {
        return resolve(AddressService::class)->update($address, $request);
    }

    /**
     * @param $address
     * @return mixed
     */
    public function destroy($address) : Response
    {
        return resolve(AddressService::class)->destroy($address);
    }
}
