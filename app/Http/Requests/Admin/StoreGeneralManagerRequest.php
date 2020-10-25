<?php

namespace App\Http\Requests\Admin;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGeneralManagerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('general_manager_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'  => [
                'string',
                'min:4',
                'max:50',
                'required',
                'unique:general_managers',
            ],
            'phone' => [
                'string',
                'min:4',
                'max:25',
                'required',
                'unique:general_managers',
            ],
        ];
    }
}
