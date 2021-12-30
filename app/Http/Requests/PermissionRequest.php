<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'min:4'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'your should enter this role mother fucker',
            'name.string' => 'please make your mind work and stop hesitating ',
            'name.min' => 'pay attention the numbers of letters man at least 5',
            'name.max' => 'do not write or put any more character more than 255',
        ];
    }
}
