<?php

namespace App\Http\Requests\Admin;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreBudgetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('budget_create');
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
