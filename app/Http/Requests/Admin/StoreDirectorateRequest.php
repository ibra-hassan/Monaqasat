<?php

namespace App\Http\Requests\Admin;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDirectorateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('directorate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
                'unique:directorates',
            ],
            'phone'       => [
                'string',
                'min:4',
                'max:25',
                'required',
                'unique:directorates',
            ],
            'province_id' => [
                'required',
                'integer',
            ],
            'manager_id'  => [
                'required',
                'integer',
            ],
        ];
    }
}
