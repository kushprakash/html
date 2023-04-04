<?php

namespace App\Http\Requests;

use App\StudentQuery;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectsRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('project_edit');
    }

    public function rules()
    {
        return [
            
        ];
    }
}
