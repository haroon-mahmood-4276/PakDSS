<?php

namespace App\Http\Controllers\User\Ajax;

use App\Http\Controllers\Controller;
use App\Services\Cities\CityInterface;
use App\Services\Countries\CountryInterface;
use App\Services\States\StateInterface;
use Illuminate\Http\Request;
use Exception;

class AddressController extends Controller
{
    private $countryInterface;
    private $stateInterface;
    private $cityInterface;

    public function __construct(CountryInterface $countryInterface, StateInterface $stateInterface, CityInterface $cityInterface)
    {
        $this->countryInterface = $countryInterface;
        $this->stateInterface = $stateInterface;
        $this->cityInterface = $cityInterface;
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
            if ($request->type === 'query') {
                $customers = $this->countryInterface->search($request->q, per_page: $request->per_page);
            }
            return apiSuccessResponse($customers);
        } catch (Exception $ex) {
            return apiErrorResponse(data: ['line_number' => $ex->getLine()], message: $ex->getMessage(), code: $ex->getCode() > 0 ? $ex->getCode() : 400);
        }
    }

    public function searchState(Request $request)
    {
        try {
            $customers = [];
            if ($request->type === 'query' && $request->has('country_id')) {
                $customers = $this->stateInterface->search($request->q, per_page: $request->per_page, country_id: $request->country_id);
            }
            return apiSuccessResponse($customers);
        } catch (Exception $ex) {
            return apiErrorResponse(data: ['line_number' => $ex->getLine()], message: $ex->getMessage(), code: $ex->getCode() > 0 ? $ex->getCode() : 400);
        }
    }

    public function searchCity(Request $request)
    {
        try {
            $customers = [];
            if ($request->type === 'query' && $request->has('state_id')) {
                $customers = $this->cityInterface->search($request->q, per_page: $request->per_page, state_id: $request->state_id);
            }
            return apiSuccessResponse($customers);
        } catch (Exception $ex) {
            return apiErrorResponse(data: ['line_number' => $ex->getLine()], message: $ex->getMessage(), code: $ex->getCode() > 0 ? $ex->getCode() : 400);
        }
    }
}
