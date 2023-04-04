<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Foundation\Http\FormRequest;

class StoreSubCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('subcategory_create');
    }

    public function rules()
    {
        return [
            // 'name' => [
            //     'required',
            // ],
        ];
    }
}
