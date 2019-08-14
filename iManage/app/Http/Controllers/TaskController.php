<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Task;
use App\Task_user;

class TaskController extends Controller
{
    public function insert(TaskRequest $request)
    {
        $task = new Task;
        $task->fill($request->all());
        $task ->save();

    }
    
    public function update(TaskRequest $request, $id)
    {
        $task = new Task;

        $task ->subject = $request ->subject ;
        $task ->description = $request ->description ;
        $task ->displacement = $request ->displacement ;
        $task ->work_calender = $request ->work_calender ;
        $task ->type = $request ->type ;
        $task ->task_status = $request ->task_status ;
        $task ->group_name = $request ->group_name ;

        $task ->save();
    }

    public function get($id)
    {    

    }

    public function feedback(Request $request)
    {
        $task_user = new Task_user;

        $task_user->feedback = $request->feedback;  
        $task_user->save();
    
    }

}
