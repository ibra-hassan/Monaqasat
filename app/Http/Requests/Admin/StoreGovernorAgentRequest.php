<?php

namespace App\Http\Requests\Admin;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGovernorAgentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('governor_agent_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
                'unique:governor_agents',
            ],
            'phone'       => [
                'string',
                'min:4',
                'max:25',
                'required',
                'unique:governor_agents',
            ],
            'governor_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
