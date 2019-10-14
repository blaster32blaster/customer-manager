<?php

namespace App\Services;

use App\Http\Requests\UpdateAddressRequest;
use App\Models\Address;
use App\Models\EmailAddress;
use Illuminate\Http\Response;

/**
 * Class EmailService
 * @package App\Services
 */
class AddressService
{
    /**
     * @param $id
     * @param UpdateAddressRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function update($id, UpdateAddressRequest $request)
    {
        try {
            $address = Address::find($id)->update($request->all());
            return response('address updated', 202);
        } catch (\PDOException $e) {
            logger()->info('pdo error updating address', ['address_update_error' => $e->getMessage()]);
        } catch (\Exception $e) {
            logger()->info('general error updating address', ['address_update_error' => $e->getMessage()]);
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
            Address::destroy(Address::find($id)->id);
            return response('address destroyed', 202);
        } catch (\PDOException $e) {
            logger()->info('pdo error address email', ['address_delete_error' => $e->getMessage()]);
        } catch (\Exception $e) {
            logger()->info('general error deleting address', ['address_delete_error' => $e->getMessage()]);
        }
        return response('delete failure', 400);
    }
}