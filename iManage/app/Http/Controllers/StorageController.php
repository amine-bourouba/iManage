<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorageRequest;
use App\Storage;
use App\Storage_user;

class StorageController extends Controller
{
    public function insert(StorageRequest $request)
    {
        $storage = new Storage;
        $storage->fill($request->all());
        $storage ->save();
    }
    public function update(StorageRequest $request, $id)
    {
        $storage = new Storage;

        $storage ->type = $request ->type;
        $storage ->name = $request ->name;
        $storage ->category = $request ->category;
        $storage ->location = $request ->location;
        $storage ->free_space = $request ->free_space;
        $storage ->capacity = $request ->capacity;
        $storage ->extension = $request ->extension;
        $storage ->serial_number = $request ->serial_number;
        $storage ->model = $request ->model;
        $storage ->file_system = $request ->file_system;
        $storage ->electric_power = $request ->electric_power;
        $storage ->delivery_date = $request ->delivery_date;
        $storage ->installation_date = $request ->installation_date;
        $storage ->state = $request ->state;
        
        $storage ->save();
    }

    public function get($id)
    {
        $storage = Storage::findOrFail($id);
        return response([
            'status' => 'success',
            'data' => [$storage]
        ], 200); 
    }
    public function feedback(Request $request)
    {
        $storage_user = new Storage_user;
        $storage_user->feedback = $request->feedback;  
        $storage ->save();
    }

}
