<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Response;
use App\Services\EmailService;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateEmailRequest;

/**
 * Class EmailController
 * @package App\Http\Controllers\Api
 */
class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param $email
     * @param UpdateEmailRequest $request
     * @return Response
     */
    public function update($email, UpdateEmailRequest $request) : Response
    {
        return resolve(EmailService::class)->update($email, $request);
    }

    /**
     * @param $email
     * @return mixed
     */
    public function destroy($email) : Response
    {
        return resolve(EmailService::class)->destroy($email);
    }
}
