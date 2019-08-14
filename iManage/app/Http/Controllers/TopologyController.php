<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopologyRequest;
use App\Topology;

class TopologyController extends Controller
{
    public function insert(TopologyRequest $request)
    {
        $topology = new Topology;
        $topology->fill($request->all());
        $topology->save();

    }

    public function get($id)
    {
        $topology = Topology::findOrFail($id);
        return response([
            'status' => 'success',
            'data' => [$topology]
        ], 200); 
    }
}
