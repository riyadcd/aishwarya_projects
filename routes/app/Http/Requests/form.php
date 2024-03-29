<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class form extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'phonenumber' => 'required|integer',
        ];
    }

     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function messages()
    {
        return [
        'name.required' => 'Name is required!',
        'email.required' => 'Email is required!',
        'password.required' => 'Password is required!',
        'phonenumber.required' => 'Phone number is required!'
        ];
    }
}
