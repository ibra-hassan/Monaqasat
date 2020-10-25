<?php

namespace App\Http\Requests\Admin;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOfficeRequest extends FormRequest
{
	public function authorize()
	{
		abort_if(Gate::denies('office_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return true;
	}

	public function rules()
	{
		return [
			'name'           => [
				'string',
				'min:4',
				'max:50',
				'required',
				'unique:offices,name,' . request()->route('office')->id,
			],
			'phone'          => [
				'string',
				'min:4',
				'max:25',
				'required',
				'unique:offices,phone,' . request()->route('office')->id,
			],
			'directorate_id' => [
				'required',
				'integer',
			],
			'manager_id'     => [
				'required',
				'integer',
			],
		];
	}
}
