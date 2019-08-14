<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorageRequest extends FormRequest
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
           'type'                   => 'required|in:Hardware,Software',
           'name'                   => 'required|string|max:50',
           'category'               => 'required|in:Customer,Enterprise',
           'location'               => 'required|string|max:50',
           'free_space'             => 'required|regex:/^[0-9]+\,?[0-9]{1,3}? (Ko|Mo|Go|To)$/',
           'capacity'               => 'required|regex:/^[0-9]+\,?[0-9]{1,3}? (Ko|Mo|Go|To)$/',
           'extension'              => 'required|regex:/^[0-9]+\,?[0-9]{1,3}? (Ko|Mo|Go|To)$/',
           'serial_number'          => 'required|regex:/^[0-9a-zA-Z-]+$/|max:20',
           'model'                  => 'required|regex:/^[0-9a-zA-Z\s-.()\/]+$/|max:30',
           'file_system'            => 'required',
           'electric_power'         => 'required|regex:/^[0-9]+\,?[0-9]{1,3}? (KV|V)$/',
           'delivery_date'          => 'required|date',
           'installation_date'      => 'required|date',
           'state'                  => 'required|in:up,down',

            
        ];
    }
}
