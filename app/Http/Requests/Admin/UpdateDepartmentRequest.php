<?php

namespace App\Http\Requests\Admin;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDepartmentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('department_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
                'unique:departments,name,' . request()->route('department')->id,
            ],
            'phone'       => [
                'string',
                'min:4',
                'max:25',
                'required',
                'unique:departments,phone,' . request()->route('department')->id,
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
