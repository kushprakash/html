<?php

namespace App\Http\Requests;

use App\StudentQuery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyProjectsRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('project_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:student_queries,id',
        ];
    }
}