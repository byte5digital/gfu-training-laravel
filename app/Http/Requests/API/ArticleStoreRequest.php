<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class ArticleStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'excerpt' => 'required',
            'text' => 'required',
        ];
    }

    // public function failedValidation(Validator $validator)
    // {
    //     return response()->json([
    //         "error" => $validator->errors()->all()
    //     ], 422);
    // }
}
