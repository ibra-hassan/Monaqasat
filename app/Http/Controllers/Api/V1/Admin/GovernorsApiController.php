<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGovernorRequest;
use App\Http\Requests\Admin\UpdateGovernorRequest;
use App\Http\Resources\Admin\GovernorResource;
use App\Models\Governor;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class GovernorsApiController extends Controller
{
	public function index()
	{
		abort_if(Gate::denies('governor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return new GovernorResource(Governor::with(['province'])->get());
	}

	public function store(StoreGovernorRequest $request)
	{
		$governor = Governor::create($request->all());

		return (new GovernorResource($governor))
			->response()
			->setStatusCode(Response::HTTP_CREATED);
	}

	public function show(Governor $governor)
	{
		abort_if(Gate::denies('governor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return new GovernorResource($governor->load(['province']));
	}

	public function update(UpdateGovernorRequest $request, Governor $governor)
	{
		$governor->update($request->all());

		return (new GovernorResource($governor))
			->response()
			->setStatusCode(Response::HTTP_ACCEPTED);
	}

	public function destroy(Governor $governor)
	{
		abort_if(Gate::denies('governor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$governor->delete();

		return response(null, Response::HTTP_NO_CONTENT);
	}
}
