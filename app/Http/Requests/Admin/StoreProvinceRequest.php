<?php

namespace App\Http\Requests\Admin;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProvinceRequest extends FormRequest
{
	public function authorize()
	{
		abort_if(Gate::denies('province_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return true;
	}

	public function rules()
	{
		return [
			'name'  => [
				'string',
				'min:4',
				'max:15',
				'required',
				'unique:provinces',
			],
			'phone' => [
				'string',
				'min:4',
				'max:25',
				'required',
				'unique:provinces',
			],
		];
	}
}
