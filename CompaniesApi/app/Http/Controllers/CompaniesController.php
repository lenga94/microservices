<?php

namespace App\Http\Controllers;

use App\Company;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class CompaniesController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }


    /**
     * Return the list of company
     * @return JsonResponse
     */
    public function index()
    {
        $companies = Company::orderBy('created_at', 'desc')->get();

        return $this->successResponse($companies);
    }

    /**
     * Return the list of company based on status
     * @return JsonResponse
     */
    public function getCompaniesByStatus(Request $request)
    {
        $rules = [
            'status' => 'required|in:ENABLED,DISABLED',
        ];

        $this->validate($request, $rules);

        $companies = Company::where('status', $request->status)
            ->orderBy('created_at', 'desc')->get();

        return $this->successResponse($companies);
    }

    /**
     * Create one new company
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $rules = [
            'company_name' => 'required|max:50',
            'company_profile' => 'nullable|max:5000',
            'status' => 'nullable|in:ENABLED,DISABLED',
            'company_image' => 'nullable|max:150',
        ];

        $this->validate($request, $rules);

        $company = Company::create($request->all());

        return $this->successResponse($company, Response::HTTP_CREATED);
    }

    /**
     * Obtains and shows one company
     * @param $company
     * @return JsonResponse
     */
    public function show($company)
    {
        $company = Company::findOrFail($company);

        return $this->successResponse($company);
    }

    /**
     * Obtains and show a company using company code
     * @param $companyCode
     * @return JsonResponse
     */
    public function getCompanyByCode($companyCode)
    {
        $company = Company::where('company_code', $companyCode)->get();

        return $this->successResponse($company);
    }

    /**
     * Update an existing book
     * @param Request $request
     * @param $company
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, $company)
    {
        $rules = [
            'company_name' => 'max:50',
            'company_profile' => 'max:5000',
            'status' => 'in:ENABLED,DISABLED',
            'company_image' => 'max:150',
        ];

        $this->validate($request, $rules);

        $company = Company::findOrFail($company);

        $company->fill($request->all());

        if($company->isClean()) {
            return $this->errorResponse('At least one value must change to update company',
                Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $company->save();

        return $this->successResponse($company);
    }

    /**
     * Remove an existing company
     * @param $company
     * @return JsonResponse
     */
    public function destroy($company)
    {
        $company = Company::findOrFail($company);

        $company->delete();

        return $this->successResponse($company);
    }
}
