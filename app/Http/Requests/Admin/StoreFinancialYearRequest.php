<?php

namespace App\Http\Requests\Admin;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreFinancialYearRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('financial_year_create');
    }

    public function rules()
    {
        return [
            'year' => [
                'string',
                'min:2',
                'max:10',
                'required',
                'unique:financial_years',
            ],
        ];
    }
}
