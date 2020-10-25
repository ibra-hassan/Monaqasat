<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGovernorAgentRequest;
use App\Http\Requests\Admin\UpdateGovernorAgentRequest;
use App\Http\Resources\Admin\GovernorAgentResource;
use App\Models\GovernorAgent;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class GovernorAgentsApiController extends Controller
{
	public function index()
	{
		abort_if(Gate::denies('governor_agent_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return new GovernorAgentResource(GovernorAgent::with(['governor'])->get());
	}

	public function store(StoreGovernorAgentRequest $request)
	{
		$governorAgent = GovernorAgent::create($request->all());

		return (new GovernorAgentResource($governorAgent))
			->response()
			->setStatusCode(Response::HTTP_CREATED);
	}

	public function show(GovernorAgent $governorAgent)
	{
		abort_if(Gate::denies('governor_agent_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return new GovernorAgentResource($governorAgent->load(['governor']));
	}

	public function update(UpdateGovernorAgentRequest $request, GovernorAgent $governorAgent)
	{
		$governorAgent->update($request->all());

		return (new GovernorAgentResource($governorAgent))
			->response()
			->setStatusCode(Response::HTTP_ACCEPTED);
	}

	public function destroy(GovernorAgent $governorAgent)
	{
		abort_if(Gate::denies('governor_agent_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$governorAgent->delete();

		return response(null, Response::HTTP_NO_CONTENT);
	}
}
