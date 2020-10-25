<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBudgetRequest;
use App\Http\Requests\Admin\UpdateBudgetRequest;
use App\Http\Resources\Admin\BudgetResource;
use App\Models\Budget;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class BudgetApiController extends Controller
{
	public function index()
	{
		abort_if(Gate::denies('budget_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return new BudgetResource(Budget::all());
	}

	public function store(StoreBudgetRequest $request)
	{
		$budget = Budget::create($request->all());

		return (new BudgetResource($budget))
			->response()
			->setStatusCode(Response::HTTP_CREATED);
	}

	public function show(Budget $budget)
	{
		abort_if(Gate::denies('budget_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return new BudgetResource($budget);
	}

	public function update(UpdateBudgetRequest $request, Budget $budget)
	{
		$budget->update($request->all());

		return (new BudgetResource($budget))
			->response()
			->setStatusCode(Response::HTTP_ACCEPTED);
	}

	public function destroy(Budget $budget)
	{
		abort_if(Gate::denies('budget_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$budget->delete();

		return response(null, Response::HTTP_NO_CONTENT);
	}
}
