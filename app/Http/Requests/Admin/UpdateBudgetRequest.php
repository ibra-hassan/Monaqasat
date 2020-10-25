<?php

namespace App\Http\Requests\Admin;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBudgetRequest extends FormRequest
{
	public function authorize()
	{
		return Gate::allows('budget_edit');
	}

	public function rules()
	{
		return [
			'budget' => [
				'required',
			],
		];
	}
}
