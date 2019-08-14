<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MachineRequest extends FormRequest
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
            'serial_number'           => 'required|regex:/^[0-9a-zA-Z-]+$/|max:20',
            'model'                   => 'required|regex:/^[0-9a-zA-Z-]+$/|max:30',
            'electric_power'          => 'required|regex:/^[0-9a-zA-Z-]+$/|max:10',
            'manufacturer'            => 'required|string|max:30',
            'machine_name'            => 'required|regex:/^[0-9a-zA-Z-]+$/|max:30',
            'installation_date'       => 'required|date',
            'software_version'        => 'required|regex:/^[0-9a-zA-Z\s-.()]+$/|max:15',
            'hardware_version'        => 'required|regex:/^[0-9a-zA-Z\s-.]+$/|max:30',
            'ip_address'              => 'required|ip',
            'mac_address'             => 'required|/^(([0-9a-fA-F]{2}[:-]){5})[0-9a-fA-F]{2}$/',
            'delivery_date'           => 'required|date',
            'category'                => 'required|in:customer,enterprise',
            'location'                => 'required|string|max:50',
            'state'                   => 'required|in:up,down',
            'notification'            => 'required|string|max:50',
            'type'                    => 'required|string|max:30',

        ];
    }
}
