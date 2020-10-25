<?php

namespace App\Http\Requests\Admin;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGovernorAgentRequest extends FormRequest
{
	public function authorize()
	{
		abort_if(Gate::denies('governor_agent_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return true;
	}

	public function rules()
	{
		return [
			'name'        => [
				'string',
				'min:4',
				'max:50',
				'required',
				'unique:governor_agents,name,' . request()->route('governor_agent')->id,
			],
			'phone'       => [
				'string',
				'min:4',
				'max:25',
				'required',
				'unique:governor_agents,phone,' . request()->route('governor_agent')->id,
			],
			'governor_id' => [
				'required',
				'integer',
			],
		];
	}
}
