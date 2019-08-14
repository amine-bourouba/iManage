<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ComplaintRequest;
use App\Complaint;


class ComplaintController extends Controller
{

    public function insert(ComplaintRequest $request)
    {
        $complaint = new Complaint;
        $complaint->fill($request->all());
        $complaint->save();
    }

    public function get($id)
    {
        $complaint = Complaint::findOrFail($id);
        return response([
            'status' => 'success',
            'data' => [$complaint]
        ], 200); 
    }

}
