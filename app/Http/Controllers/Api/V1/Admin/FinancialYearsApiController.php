<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFinancialYearRequest;
use App\Http\Requests\Admin\UpdateFinancialYearRequest;
use App\Http\Resources\Admin\FinancialYearResource;
use App\Models\FinancialYear;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class FinancialYearsApiController extends Controller
{
	public function index()
	{
		abort_if(Gate::denies('financial_year_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return new FinancialYearResource(FinancialYear::all());
	}

	public function store(StoreFinancialYearRequest $request)
	{
		$financialYear = FinancialYear::create($request->all());

		return (new FinancialYearResource($financialYear))
			->response()
			->setStatusCode(Response::HTTP_CREATED);
	}

	public function show(FinancialYear $financialYear)
	{
		abort_if(Gate::denies('financial_year_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return new FinancialYearResource($financialYear);
	}

	public function update(UpdateFinancialYearRequest $request, FinancialYear $financialYear)
	{
		$financialYear->update($request->all());

		return (new FinancialYearResource($financialYear))
			->response()
			->setStatusCode(Response::HTTP_ACCEPTED);
	}

	public function destroy(FinancialYear $financialYear)
	{
		abort_if(Gate::denies('financial_year_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$financialYear->delete();

		return response(null, Response::HTTP_NO_CONTENT);
	}
}
