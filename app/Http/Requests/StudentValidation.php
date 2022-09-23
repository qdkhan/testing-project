<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentValidation extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fname' => 'required',
            'lname' => 'required',
            'mobile' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'fname.required' => 'First name field is required',
            'lname.required' => 'Last name field is required',
            'mobile.required' => 'Mobile field is required',
        ];
    }
}
