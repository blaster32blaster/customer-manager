<?php

namespace App\Services;

use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Response;
use App\Http\Resources\CustomersResource;

/**
 * Class CustomerApiService
 * @package App\Services
 */
class CustomerApiService
{
    /**
     * @return Response
     */
    public function index() : Response
    {
        try {
            return response(new CustomersResource(Customer::all()));
        } catch (\PDOException $e) {
            logger()->info('pdo error fetching customers', ['customer_fetch_error' => $e->getMessage()]);
        } catch (\Exception $e) {
            logger()->info('general error fetching customers', ['customer_fetch_error' => $e->getMessage()]);
        }
        return response([]);
    }

    /**
     * @param $id
     * @return Response
     */
    public function show($id) : Response
    {
        try {
            return response(new CustomersResource(Customer::find($id)));
        } catch (\PDOException $e) {
            logger()->info('pdo error fetching customers', ['customer_fetch_error' => $e->getMessage()]);
        } catch (\Exception $e) {
            logger()->info('general error fetching customers', ['customer_fetch_error' => $e->getMessage()]);
        }
        return response([]);
    }

    /**
     * @param $id
     * @param UpdateCustomerRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function update($id, UpdateCustomerRequest $request) : Response
    {
        try {
            $customer = Customer::find($id)->update($request->all());
            return response('customer updated', 202);
        } catch (\PDOException $e) {
            logger()->info('pdo error updating customer', ['customer_update_error' => $e->getMessage()]);
        } catch (\Exception $e) {
            logger()->info('general error updating customer', ['customer_update_error' => $e->getMessage()]);
        }
        return response('update failure', 400);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function destroy($id)
    {
        try {
            Customer::destroy(Customer::find($id)->id);
            return response('customer destroyed', 202);
        } catch (\PDOException $e) {
            logger()->info('pdo error deleting customer', ['customer_delete_error' => $e->getMessage()]);
        } catch (\Exception $e) {
            logger()->info('general error deleting customer', ['customer_delete_error' => $e->getMessage()]);
        }
        return response('delete failure', 400);
    }
}