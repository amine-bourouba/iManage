<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DocumentTypeRule;

class DocumentRequest extends FormRequest
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
            'type'                    => ['required', new DocumentTypeRule],
            'name'                    => 'required|string/|max:30',
            'size'                    => 'required',
            'content'                 => 'required|size:25000',
            'user_manual'             => 'required|size:25000',
            'workshop_manual'         => 'required|size:25000'
        ];
    }
}


