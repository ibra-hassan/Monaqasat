<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreProjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('project_create');
    }

    public function rules()
    {
        return [
            'name'           => [
                'string',
                'min:10',
                'max:50',
                'required',
                'unique:projects',
            ],
            'target_number'  => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'description'    => [
                'string',
                'min:5',
                'max:191',
            ],
            'start_date'     => [
                'required',
                'date_format:' . config('tender.date_format'),
            ],
            'estimated_year' => [
                'nullable',
                'integer',
                'min:1',
                'max:10',
            ],
            'cost_primary'   => [
                'required',
            ],
            'type_id'        => [
                'required',
                'integer',
            ],
            'nature_id'      => [
                'required',
                'integer',
            ],
            'directorate_id' => [
                'required',
                'integer',
            ],
            'file_path'      => [
                'required',
                'mimes:pdf',
                'max:2048',
            ],
        ];
    }
}
