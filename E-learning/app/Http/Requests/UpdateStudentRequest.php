<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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


            'name' => 'required|between :3,30|regex:/^[a-zA-Z\s]+$/',
            'course_id' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|between :10,50',
            'address' => 'required|max:50 |min:3',
            'phone' => 'required|digits_between :11,15|numeric',
        ];
    }
}