<?php

namespace App\Http\Controllers\User\Ajax;

use App\Http\Controllers\Controller;
use App\Services\User\Addresses\AddressInterface;
use Illuminate\Http\Request;
use Exception;

class AddressController extends Controller
{
    private $addressInterface;

    public function __construct(AddressInterface $addressInterface)
    {
        $this->addressInterface = $addressInterface;
    }

    public function create(Request $request)
    {
        try {
            abort_if(!request()->ajax(), 403);

            $data = [];

            return apiSuccessResponse([
                'modalPlace' => 'modalPlace',
                'currentModal' => 'basicModal',
                'modal' => view('user.addresses.modal.create', $data)->render(),
            ]);
        } catch (Exception $ex) {
            return apiErrorResponse(data: ['line_number' => $ex->getLine()], message: $ex->getMessage(), code: $ex->getCode() > 0 ? $ex->getCode() : 400);
        }
    }

    public function searchCountry(Request $request)
    {
        try {
            $customers = [];
            if ($request->type === 'query' && strlen($request->q) > 1) {
                $customers = $this->addressInterface->countrySearch($request->q, ($request->has('ignoredCustomerId') ? intval($request->ignoredCustomerId) : 0));
            }
            return apiSuccessResponse($customers);
        } catch (Exception $ex) {
            return apiErrorResponse(data: ['line_number' => $ex->getLine()], message: $ex->getMessage(), code: $ex->getCode() > 0 ? $ex->getCode() : 400);
        }
    }
}
