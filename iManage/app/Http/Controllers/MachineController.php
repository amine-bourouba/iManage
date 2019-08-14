<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MachineRequest;
use App\Document;
use App\Machine_user;

class MachineController extends Controller
{
    public function insert(MachineRequest $request)
    {
        $machine = new Machine;
        $machine->fill($request->all());
        $machine->save();
        
    }
    public function update(MachineRequest $request, $id)
    {
        $machine = new Machine;

        $machine->serial_number = $request->serial_number;
        $machine->model= $request->model;
        $machine->electric_power = $request->electric_power;
        $machine->manufacturer = $request->manufacturer;
        $machine->machine_name = $request->machine_name;
        $machine->installation_date = $request->installation_date;
        $machine->software_version = $request->software_version;
        $machine->hardware_version = $request->hardware_version;
        $machine->ip_address = $request->ip_address;
        $machine->mac_address = $request->mac_address;
        $machine->delivery_date = $request->delivery_date;
        $machine->category = $request->category;
        $machine->location = $request->location;
        $machine->state = $request->state;
        $machine->notification = $request->notification;
        $machine->type = $request->type;
        
        $machine->save();
    }
    
    public function get($id)
    {
        $machine = Machine::findOrFail($id);
        return response([
            'status' => 'success',
            'data' => [$machine]
        ], 200); 
    }

    public function feedback(Request $request)
    {
        $machine_user = new Machine_user;
        $machine_user->feedback = $request->feedback;
        $machine_user->save();
    }

}
