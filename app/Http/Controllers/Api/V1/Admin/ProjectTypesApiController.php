<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProjectTypeRequest;
use App\Http\Requests\Admin\UpdateProjectTypeRequest;
use App\Http\Resources\Admin\ProjectTypeResource;
use App\Models\ProjectType;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class ProjectTypesApiController extends Controller
{
	public function index()
	{
		abort_if(Gate::denies('project_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return new ProjectTypeResource(ProjectType::all());
	}

	public function store(StoreProjectTypeRequest $request)
	{
		$projectType = ProjectType::create($request->all());

		return (new ProjectTypeResource($projectType))
			->response()
			->setStatusCode(Response::HTTP_CREATED);
	}

	public function show(ProjectType $projectType)
	{
		abort_if(Gate::denies('project_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return new ProjectTypeResource($projectType);
	}

	public function update(UpdateProjectTypeRequest $request, ProjectType $projectType)
	{
		$projectType->update($request->all());

		return (new ProjectTypeResource($projectType))
			->response()
			->setStatusCode(Response::HTTP_ACCEPTED);
	}

	public function destroy(ProjectType $projectType)
	{
		abort_if(Gate::denies('project_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$projectType->delete();

		return response(null, Response::HTTP_NO_CONTENT);
	}
}
