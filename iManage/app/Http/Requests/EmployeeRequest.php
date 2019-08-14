<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PhoneRule;

class EmployeeRequest extends FormRequest
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
                'full_name'             => 'required|string|max:255',
                'date_of_birth'         => 'required|date',
                'place_of_birth'        => 'required|string|max:255',
                'address'               => 'required|string|max:255',
                'phone'                 => ['required',new PhoneRule],
                'email_pro'             => 'required|email|max:255|unique:employees',
                'job_title'             => 'required|string|max:60',
                'office'                => 'required|string|max:100',
                'department'            => 'required|string|max:100',
                //'enterprise'            => 'required|string|max:100',
                'gender'                => 'required|in:male,female',
                'marital_status'        => 'required|in:Single,Married,Divorced,Widowed',
                'hire_date'             => 'required|date',
                'photo'                 => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'admin'                 => 'required|in:true,false',
            ];
        }else {
            return [
                'full_name'             => 'string|max:255',
                'date_of_birth'         => 'date',
                'place_of_birth'        => 'string|max:255',
                'address'               => 'string|max:255',
                'phone'                 => [new PhoneRule],
                'email_pro'             => 'email|max:255|unique:employees',
                'job_title'             => 'string|max:60',
                'office'                => 'string|max:100',
                'department'            => 'string|max:100',
                //'enterprise'            => 'string|max:100',
                'gender'                => 'in:male,female',
                'marital_status'        => 'in:Single,Married,Divorced,Widowed',
                'hire_date'             => 'date',
                'photo'                 => 'image|mimes:jpeg,png,jpg,gif,svg',
                'admin'                 => 'in:true,false',
            ];
        }
    }
}
