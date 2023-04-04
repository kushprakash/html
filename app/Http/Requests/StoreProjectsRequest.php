<?php

namespace App\Http\Requests;

use App\StudentQuery;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectsRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('project_create');
    }

    public function rules()
    {
        return [
            
        ];
    }
}
