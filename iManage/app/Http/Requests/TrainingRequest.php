<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingRequest extends FormRequest
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
            'type'                   => 'required|in:Enterprise,Employee,Member',
            'subject'                => 'required|string|max:30',
            'description'            => 'required|string|max:500',
            'location'               => 'required|string|max:50',
            'calender'               => 'required|date',
        ];
    }
}
