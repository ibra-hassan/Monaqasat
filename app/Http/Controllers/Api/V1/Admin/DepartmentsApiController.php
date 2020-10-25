<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDepartmentRequest;
use App\Http\Requests\Admin\UpdateDepartmentRequest;
use App\Http\Resources\Admin\DepartmentResource;
use App\Models\Department;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class DepartmentsApiController extends Controller
{
	public function index()
	{
		abort_if(Gate::denies('department_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return new DepartmentResource(Department::with(['province'])->get());
	}

	public function store(StoreDepartmentRequest $request)
	{
		$department = Department::create($request->all());

		return (new DepartmentResource($department))
			->response()
			->setStatusCode(Response::HTTP_CREATED);
	}

	public function show(Department $department)
	{
		abort_if(Gate::denies('department_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return new DepartmentResource($department->load(['province']));
	}

	public function update(UpdateDepartmentRequest $request, Department $department)
	{
		$department->update($request->all());

		return (new DepartmentResource($department))
			->response()
			->setStatusCode(Response::HTTP_ACCEPTED);
	}

	public function destroy(Department $department)
	{
		abort_if(Gate::denies('department_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$department->delete();

		return response(null, Response::HTTP_NO_CONTENT);
	}
}
