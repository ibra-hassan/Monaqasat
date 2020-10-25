<?php

namespace App\Http\Requests\Admin;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectNatureRequest extends FormRequest
{
	public function authorize()
	{
		return Gate::allows('project_nature_edit');
	}

	public function rules()
	{
		return [
			'title' => [
				'string',
				'min:3',
				'max:25',
				'required',
				'unique:project_natures,title,' . request()->route('project_nature')->id,
			],
		];
	}
}
