<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ApplicationRequest;
use App\Application;
use App\Application_user;

class ApplicationController extends Controller
{
    public function insert(ApplicationRequest $request)
    {
        $application = new Application;
        $application->fill($request->all());
        $application->save();
    }
    public function update(ApplicationRequest $request, $id)
    {
        $application = new Application;

        $application->name = $request->name;
        $application->pubisher = $request->pubisher;
        $application->size = $request->size;
        $application->version = $request->version;
        $application->installation_date = $request->installation_date;

        $application->save();
    }

    public function get($id)
    {
        $application = Application::findOrFail($id);
        return response([
            'status' => 'success',
            'data' => [$application]
        ], 200); 
    }

    public function feedback(Request $request)
    {
        $application_user = new Application_user;
        $application_user->feedback = $request->feedback;
        $application_user->save();
    }

}
