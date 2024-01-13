<?php

namespace App\Http\Controllers\User\Ajax;

use App\Http\Controllers\Controller;
use Exception;
use Request;

class AddressController extends Controller
{
    public function create(Request $request) 
    {
        try {
            abort_if(!request()->ajax(), 403);

            $data = [
                'modalPlace' => 'modalPlace',
                'currentModal' => 'basicModal',
                'modal' => view('user.addresses.modal.create')->render(),
            ];

            return apiSuccessResponse($data);
        } catch (Exception $ex) {
            return apiErrorResponse(data: ['line_number' => $ex->getLine(),], message: $ex->getMessage(), code: $ex->getCode() > 0 ? $ex->getCode() : 400);
        }
    }
}
