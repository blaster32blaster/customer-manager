<?php

namespace App\Services;

use App\Models\Customer;
use App\Http\Requests\NewCustomerRequest;

/**
 * Class CustomerService
 * @package App\Services
 */
class CustomerService
{
    /**
     * @param NewCustomerRequest $request
     * @return Customer|null
     */
    public function store(NewCustomerRequest $request) : ?Customer
    {
        try {
            $customer = new Customer();
            $customer->fill($request->all())->save();
            return $customer;
        } catch (\PDOException $e) {
            logger()->error('failure creating user. pdo error', ['user_creation_failure' => $e->getMessage()]);
        } catch (\Exception $e) {
            logger()->error('failure creating user. general error', ['user_creation_failure' => $e->getMessage()]);
        }
        return null;
    }
}