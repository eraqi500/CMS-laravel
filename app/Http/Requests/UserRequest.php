<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => ['required', 'string', 'max:255','unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'avatar' => ['file'],
            'password' => ['min:6', 'confirmed'],
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Yo, what should I call you?',
            'email.required' => 'We need your email address also',
            'password.min' => 'Are you serious were the 8 letter stupied',
            'username.required' => 'you should at write your user name',
        ];
    }
}
