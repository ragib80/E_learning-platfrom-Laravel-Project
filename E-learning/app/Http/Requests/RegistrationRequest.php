<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
           
            
            'full_name'=>'required|max:30 |min:3',
            'user_name'=>'required|max:30 |min:3',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|min:10|max:50',
            'password'=>'required|max:20|min:8|alpha_num| required_with:cpassword|same:cpassword',
            'cpassword'=>'required|max:20|min:8|alpha_num',
            
            'address'=>'required|max:50 |min:3',
            'country'=>'required|max:20 |min:3',
            'dob'=>'required',
        ];
    }
}