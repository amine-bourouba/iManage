<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingRequest;
use App\Training;
use App\Training_user;

class TrainingController extends Controller
{
    public function insert( TrainingRequest $request)
    {
        $training = new Training;
        $training->fill($request->all());
        $training ->save();
    }
    public function update( TrainingRequest $request, $id)
    {
        $training = new Training;

        $training ->type = $request ->type;
        $training ->subject = $request ->subject;
        $training ->description = $request ->description;
        $training ->location = $request ->location;
        $training ->calender= $request ->calender;

        $training ->save();
        
    }
    
    public function get($id)
    {
        $training = Training::findOrFail($id);
        return response([
            'status' => 'success',
            'data' => [$training]
        ], 200); 
    }

    public function feedback(Request $request)
    {
        $training_user = new Training_user;

        $training_user->feedback = $request->feedback;  
        $training_user->save();
    
    }

    
    
}
