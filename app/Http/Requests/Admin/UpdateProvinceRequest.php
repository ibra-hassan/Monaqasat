<?php

namespace App\Http\Requests\Admin;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProvinceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('province_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
                'unique:provinces,name,' . request()->route('province')->id,
            ],
            'phone' => [
                'string',
                'min:4',
                'max:25',
                'required',
                'unique:provinces,phone,' . request()->route('province')->id,
            ],
        ];
    }
}
