<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGeneralManagerRequest;
use App\Http\Requests\Admin\UpdateGeneralManagerRequest;
use App\Http\Resources\Admin\GeneralManagerResource;
use App\Models\GeneralManager;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class GeneralManagersApiController extends Controller
{
	public function index()
	{
		abort_if(Gate::denies('general_manager_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return new GeneralManagerResource(GeneralManager::all());
	}

	public function store(StoreGeneralManagerRequest $request)
	{
		$generalManager = GeneralManager::create($request->all());

		return (new GeneralManagerResource($generalManager))
			->response()
			->setStatusCode(Response::HTTP_CREATED);
	}

	public function show(GeneralManager $generalManager)
	{
		abort_if(Gate::denies('general_manager_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return new GeneralManagerResource($generalManager);
	}

	public function update(UpdateGeneralManagerRequest $request, GeneralManager $generalManager)
	{
		$generalManager->update($request->all());

		return (new GeneralManagerResource($generalManager))
			->response()
			->setStatusCode(Response::HTTP_ACCEPTED);
	}

	public function destroy(GeneralManager $generalManager)
	{
		abort_if(Gate::denies('general_manager_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$generalManager->delete();

		return response(null, Response::HTTP_NO_CONTENT);
	}
}
