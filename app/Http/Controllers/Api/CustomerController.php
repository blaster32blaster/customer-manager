<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\CustomersResource;
use App\Models\Customer;
use App\Services\CustomerApiService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class CustomerController
 * @package App\Http\Controllers\Api
 */
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : Response
    {
        return resolve(CustomerApiService::class)->index();
    }

    /**
     * @param $customer
     * @return mixed
     */
    public function show($customer) : Response
    {
        return resolve(CustomerApiService::class)->show($customer);
    }

    /**
     * @param $customer
     * @param UpdateCustomerRequest $request
     * @return Response
     */
    public function update($customer, UpdateCustomerRequest $request) : Response
    {
        return resolve(CustomerApiService::class)->update($customer, $request);
    }

    /**
     * @param $customer
     * @return mixed
     */
    public function destroy($customer) : Response
    {
        return resolve(CustomerApiService::class)->destroy($customer);
    }
}
