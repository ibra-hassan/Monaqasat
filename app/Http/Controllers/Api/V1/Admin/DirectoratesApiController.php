<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDirectorateRequest;
use App\Http\Requests\Admin\UpdateDirectorateRequest;
use App\Http\Resources\Admin\DirectorateResource;
use App\Models\Directorate;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class DirectoratesApiController extends Controller
{
	public function index()
	{
		abort_if(Gate::denies('directorate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return new DirectorateResource(Directorate::with(['province'])->get());
	}

	public function store(StoreDirectorateRequest $request)
	{
		$directorate = Directorate::create($request->all());

		return (new DirectorateResource($directorate))
			->response()
			->setStatusCode(Response::HTTP_CREATED);
	}

	public function show(Directorate $directorate)
	{
		abort_if(Gate::denies('directorate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return new DirectorateResource($directorate->load(['province']));
	}

	public function update(UpdateDirectorateRequest $request, Directorate $directorate)
	{
		$directorate->update($request->all());

		return (new DirectorateResource($directorate))
			->response()
			->setStatusCode(Response::HTTP_ACCEPTED);
	}

	public function destroy(Directorate $directorate)
	{
		abort_if(Gate::denies('directorate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$directorate->delete();

		return response(null, Response::HTTP_NO_CONTENT);
	}
}
