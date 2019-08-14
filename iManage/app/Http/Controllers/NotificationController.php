<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationRequest;
use App\Notification;

class NotificationController extends Controller
{
    public function insert(NotificationRequest $request)
    {
        $notification = new Notification;
        $notification->fill($request->all());
        $notification->save();
    }
    public function get($id)
    {
        $notification = Notification::findOrFail($id);
        return response([
            'status' => 'success',
            'data' => [$notification]
        ], 200); 
    }
}
