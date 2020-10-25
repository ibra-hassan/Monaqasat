<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProvinceRequest;
use App\Http\Requests\Admin\UpdateProvinceRequest;
use App\Http\Resources\Admin\ProvinceResource;
use App\Models\Province;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class ProvincesApiController extends Controller
{
	public function index()
	{
		abort_if(Gate::denies('province_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return new ProvinceResource(Province::all());
	}

	public function store(StoreProvinceRequest $request)
	{
		$province = Province::create($request->all());

		return (new ProvinceResource($province))
			->response()
			->setStatusCode(Response::HTTP_CREATED);
	}

	public function show(Province $province)
	{
		abort_if(Gate::denies('province_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return new ProvinceResource($province);
	}

	public function update(UpdateProvinceRequest $request, Province $province)
	{
		$province->update($request->all());

		return (new ProvinceResource($province))
			->response()
			->setStatusCode(Response::HTTP_ACCEPTED);
	}

	public function destroy(Province $province)
	{
		abort_if(Gate::denies('province_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$province->delete();

		return response(null, Response::HTTP_NO_CONTENT);
	}
}
