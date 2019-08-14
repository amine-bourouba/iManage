<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DutytimeRequest;
use App\Dutytime;


class DutytimeController extends Controller
{
    public function insert(DutytimeRequest $request)
    {
        $dutytime = new Dutytime;
        $dutytime->fill($request->all());
        $dutytime->save();
    }

    public function update(DutytimeRequest $request, $id)
    {
        $dutytime = new Dutytime;

        $dutytime->duty_day = $request->duty_day;
        $dutytime->duty_time = $request->duty_time;
        $dutytime->off_days= $request->off_days;
        $dutytime->events= $request->events;
        $dutytime->overtime= $request->overtime;
        
        $dutytime->save();
    }
    
    public function get($id)
    {
        $dutytime = Dutytime::findOrFail($id);
      return response([
         'status' => 'success',
         'data' => [$dutytime]
         ], 200); 
    }
}
