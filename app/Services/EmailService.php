<?php

namespace App\Services;

use App\Http\Requests\UpdateEmailRequest;
use App\Models\EmailAddress;
use Illuminate\Http\Response;

/**
 * Class EmailService
 * @package App\Services
 */
class EmailService
{
    /**
     * @param $id
     * @param UpdateEmailRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function update($id, UpdateEmailRequest $request)
    {
        try {
            $email = EmailAddress::find($id)->update($request->all());
            return response('email updated', 202);
        } catch (\PDOException $e) {
            logger()->info('pdo error updating email', ['email_update_error' => $e->getMessage()]);
        } catch (\Exception $e) {
            logger()->info('general error updating email', ['email_update_error' => $e->getMessage()]);
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
            EmailAddress::destroy(EmailAddress::find($id)->id);
            return response('email destroyed', 202);
        } catch (\PDOException $e) {
            logger()->info('pdo error deleting email', ['email_delete_error' => $e->getMessage()]);
        } catch (\Exception $e) {
            logger()->info('general error deleting email', ['email_delete_error' => $e->getMessage()]);
        }
        return response('delete failure', 400);
    }
}