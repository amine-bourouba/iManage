<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FinanceRequest;
use App\Finance;

class FinanceController extends Controller
{
    public function insert(FinanceRequest $request)
    {
        $finance = new Finance;
        $finance->fill($request->all());
        $finance->save();
    }

    public function get($id)
    {
        $finance = Finance::findOrFail($id);
        return response([
           'status' => 'success',
           'data' => [$finance]
        ], 200); 
    }
}
