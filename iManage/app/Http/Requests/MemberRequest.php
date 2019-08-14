<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PhoneRule;

class MemberRequest extends FormRequest
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
        if($method == 'POST'){
            return [
                //
                'fullname'              => 'required|string|max:255',
                'date_of_birth'         => 'required|date',
                'place_of_birth'        => 'required|string|max:255',
                'address'               => 'required|string|max:255',
                'phone'                 => ['required',new PhoneRule],
                'email_pro'             => 'required|email|max:255|unique:members',
                'job_title'             => 'required|string|max:60',
                'gender'                => 'required|in:male,female',
                'photo'                 => 'required|image|mimes:jpeg,png,jpg,gif,svg',
              
            ];
        }else {
            return [
                //
                'fullname'              => 'string|max:255',
                'date_of_birth'         => 'date',
                'place_of_birth'        => 'string|max:255',
                'address'               => 'string|max:255',
                'phone'                 => [new PhoneRule],
                'email_pro'             => 'email|max:255|unique:members',
                'job_title'             => 'string|max:60',
                'gender'                => 'in:male,female',
                'photo'                 => 'image|mimes:jpeg,png,jpg,gif,svg',
              
            ];
        }
    }
}

