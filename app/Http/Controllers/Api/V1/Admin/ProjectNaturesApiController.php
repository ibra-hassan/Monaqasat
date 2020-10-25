<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProjectNatureRequest;
use App\Http\Requests\Admin\UpdateProjectNatureRequest;
use App\Http\Resources\Admin\ProjectNatureResource;
use App\Models\ProjectNature;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class ProjectNaturesApiController extends Controller
{
	public function index()
	{
		abort_if(Gate::denies('project_nature_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return new ProjectNatureResource(ProjectNature::all());
	}

	public function store(StoreProjectNatureRequest $request)
	{
		$projectNature = ProjectNature::create($request->all());

		return (new ProjectNatureResource($projectNature))
			->response()
			->setStatusCode(Response::HTTP_CREATED);
	}

	public function show(ProjectNature $projectNature)
	{
		abort_if(Gate::denies('project_nature_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return new ProjectNatureResource($projectNature);
	}

	public function update(UpdateProjectNatureRequest $request, ProjectNature $projectNature)
	{
		$projectNature->update($request->all());

		return (new ProjectNatureResource($projectNature))
			->response()
			->setStatusCode(Response::HTTP_ACCEPTED);
	}

	public function destroy(ProjectNature $projectNature)
	{
		abort_if(Gate::denies('project_nature_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$projectNature->delete();

		return response(null, Response::HTTP_NO_CONTENT);
	}
}
