<?php

namespace App\Http\Requests\Admin;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGovernorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('governor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
                'unique:governors',
            ],
            'phone'       => [
                'string',
                'min:4',
                'max:25',
                'required',
                'unique:governors',
            ],
            'province_id' => [
                'required',
                'integer',
                'unique:governors',
            ],
        ];
    }
}
