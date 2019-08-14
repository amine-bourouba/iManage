<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\UserRequest;
use App\Enterprise;
use App\Employee;
use App\User;

class EmployeeController extends Controller
{
    public function register(EmployeeRequest $employeeRequest, UserRequest $userRequest)
    {     
      $user = new User;
      $user->fill($userRequest->all());
      $user->password      = bcrypt($userRequest->password);
      $user->profile_type  = 'Employee';

      $email = User::where('email','=',$userRequest->email)->first();

      if ($email) {

         return response()->json([
             'success' => false,
             'message' => '"' . $userRequest->email .  '" already in use, try again. '        
         ], 200);

      }else{
          
          $employee = new Employee;
          $employee->enterprise_id = auth()->user()->profile_id;
          $employee->fill($employeeRequest->all());
          $employee->enterprise = Enterprise::where('id', '=', auth()->user()->profile_id)
                                            ->value('name');
          $employee ->save();
          
          $user->profile_id = $employee->id;
          $user->save();
      }
    }

    
    public function update(EmployeeRequest $employeeRequest, UserRequest $userRequest, $id)
    {   
        $employee_to_update = Employee::findOrFail($id);
        $enter_id = Employee::where('id','=',$id)->get()->first()->enterprise_id;
        
        
        if ($enter_id == Enterprise::where('id','=',auth()->user()->profile_id)->get()->first()->id) 
        {    
            $user_to_update = User::where('profile_type','=','Employee')->where('profile_id','=',$id)->get()->first();
            $email = User::where('profile_type','=','Employee')->where('profile_id','=',$id)->value('email');
            if ($userRequest->email == $email)
            {         
                $user_is_updated = $user_to_update->update($userRequest->only('username','password'));     
            }
            else
            {  
                $userRequest->validate([
                'email' => 'string|email|max:255|unique:users',
                ]);
                $user_is_updated = $user_to_update->update($userRequest->only('email','username','password'));
            }

            $employee_is_updated = $employee_to_update->update($employeeRequest->except('id,created_at,updated_at')); 
            if($user_is_updated || $employee_is_updated)
            {
                return response()->json([
                    'message'=> 'PROFILE SUCCESSFULLY UPDATED !',
                    'data_user' => $user_to_update->only('email','username'),
                    'data_employee' => $employee_to_update->makeHidden(['id','enterprise_id','created_at','updated_at','deleted_at'])
                ],200);
            }
            else
            {
                return response()->json([
                    'success'=> false,
                    'message'=> 'ERROR : PROFILE COULD NOT BE UPDATED' 
                ],404);
            }
        }
        else 
        {
            return response()->json(['message' => 'ERROR : YOU CAN ONLY UPDATE THE PROFILE OF YOUR OWN EMPLOYEES']);
        }      
 
    }
   
    public function get($id = NULL)
   {
    if ($id != NULL) {
        $employee = Employee::findOrFail($id);
    } else {

        if (auth()->user()->profile_type === 'Employee') {
            $employee = Employee::findOrFail(auth()->user()->profile_id);
        } else {
            return response()->json(['message' => 'ERROR : ENTER AN EMPLOYEE ID'], 401);
        }
        
    }
    return response([
        'data' => $employee->makeHidden(['id','enterprise_id','created_at','updated_at','deleted_at'])
     ], 200);
     
   } 

    public function destroy($id)
    {   
        $employee = Employee::findOrFail($id);
        if ($employee->enterprise_id == Enterprise::where('id','=',auth()->user()->profile_id)->value('id')) {

            $employee->delete(); 
            $user = User::where('profile_type','=','Employee')->where('profile_id','=',$id)->delete();
            return redirect('auth.logout')->with('status', 'PROFILE SUCCESSFULLY DELETED!');

        }else {
            return response()->json(['message' => 'ERROR : YOU CAN ONLY DELETE THE PROFILE OF YOUR OWN EMPLOYEES']);
        }  
    }
   
}