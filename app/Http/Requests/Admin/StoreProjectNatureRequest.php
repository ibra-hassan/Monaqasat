<?php

namespace App\Http\Requests\Admin;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectNatureRequest extends FormRequest
{
	public function authorize()
	{
		return Gate::allows('project_nature_create');
	}

	public function rules()
	{
		return [
			'title' => [
				'string',
				'min:3',
				'max:25',
				'required',
				'unique:project_natures',
			],
		];
	}
}
