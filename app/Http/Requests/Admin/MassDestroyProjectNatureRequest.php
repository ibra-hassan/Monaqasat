<?php

namespace App\Http\Requests\Admin;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProjectNatureRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('project_nature_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:project_natures,id',
        ];
    }
}
