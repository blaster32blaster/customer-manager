<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\View\View;
use App\Services\CustomerService;
use App\Http\Resources\CustomerResource;
use App\Http\Requests\NewCustomerRequest;

/**
 * Class CustomerController
 * @package App\Http\Controllers
 */
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all()->map(function ($customer) {
            $cussub = new CustomerResource($customer);
            return $cussub->toArray($this);
        });

        return view('customer.list')
            ->with([
                'customers' =>
                $customers
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create() : View
    {
        return view('customer.create', ['customer' => new Customer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewCustomerRequest $request
     * @return View
     */
    public function store(NewCustomerRequest $request) : View
    {
        resolve(CustomerService::class)->store($request);
        return view('customer.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Customer|null
     */
    public function show($id) :? Customer
    {
        return Customer::find($id);
    }
}
