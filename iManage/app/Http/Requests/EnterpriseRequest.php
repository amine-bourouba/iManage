<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PhoneRule;
use App\Rules\FaxRule;

class EnterpriseRequest extends FormRequest
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
                'name'                   => 'required|string|max:100',
                'phone'                  => ['required',new PhoneRule],
                'fax'                    => ['required',new FaxRule],
                'email_pro'              => 'required|email|max:255|unique:enterprises',
                'website'                => 'required|url|max:255|unique:enterprises',
                'address'                => 'required|string|max:255',
                'activity'               => 'required|string|max:255',
                'logo'                   => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'covered_region'         => 'required|string|max:255',
                'category'               => 'required|in:private,public',
             ];
        }else {
            return [
                'name'                   => 'string|max:100',
                'phone'                  => [new PhoneRule],
                'fax'                    => [new FaxRule],
                'email_pro'              => 'email|max:255|unique:enterprises',
                'website'                => 'url|max:255|unique:enterprises',
                'address'                => 'string|max:255',
                'activity'               => 'string|max:255',
                'logo'                   => 'image|mimes:jpeg,png,jpg,gif,svg',
                'covered_region'         => 'string|max:255',
                'category'               => 'in:private,public',
             ];
        }
        
    }
}
