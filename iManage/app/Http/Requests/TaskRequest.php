<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'subject'                    => 'required|string|max:30',
            'description'                => 'required|string|max:500',
            'displacement'               => 'required|string|max:30',
            'work_calender'              => 'required|date',
            'type'                       => 'required|in:Group,Individual',
            'task_status'                => 'required|regex/^([0-9]{2}|100)$/',
            'group_name'                 => 'required|string|max:20',
        ];
    }
}
