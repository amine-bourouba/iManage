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
        $method = '';
        if ($method == 'POST') {
            return [
                'username'  => 'required|string|max:255|unique:users',
                'email'     => 'required|email|max:255|unique:users',
                'password'  => 'required|string|min:6|max:10',
                
            ];
        }else {
            return [
                'username'  => 'string|max:255|unique:users',
                'email'     => 'email|max:255',
                'password'  => 'string|min:6|max:10',
                
            ];
        }
    }
}
