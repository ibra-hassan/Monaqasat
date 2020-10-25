<?php

namespace App\Http\Requests\Admin;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectTypeRequest extends FormRequest
{
	public function authorize()
	{
		return Gate::allows('project_type_edit');
	}

	public function rules()
	{
		return [
			'title' => [
				'string',
				'min:3',
				'max:25',
				'required',
				'unique:project_types,title,' . request()->route('project_type')->id,
			],
		];
	}
}
