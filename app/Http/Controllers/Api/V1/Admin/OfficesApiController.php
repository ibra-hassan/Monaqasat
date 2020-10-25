<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOfficeRequest;
use App\Http\Requests\Admin\UpdateOfficeRequest;
use App\Http\Resources\Admin\OfficeResource;
use App\Models\Office;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class OfficesApiController extends Controller
{
	public function index()
	{
		abort_if(Gate::denies('office_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return new OfficeResource(Office::with(['directorate'])->get());
	}

	public function store(StoreOfficeRequest $request)
	{
		$office = Office::create($request->all());

		return (new OfficeResource($office))
			->response()
			->setStatusCode(Response::HTTP_CREATED);
	}

	public function show(Office $office)
	{
		abort_if(Gate::denies('office_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return new OfficeResource($office->load(['directorate']));
	}

	public function update(UpdateOfficeRequest $request, Office $office)
	{
		$office->update($request->all());

		return (new OfficeResource($office))
			->response()
			->setStatusCode(Response::HTTP_ACCEPTED);
	}

	public function destroy(Office $office)
	{
		abort_if(Gate::denies('office_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$office->delete();

		return response(null, Response::HTTP_NO_CONTENT);
	}
}
