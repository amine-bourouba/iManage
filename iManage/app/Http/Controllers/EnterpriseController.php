<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EnterpriseRequest;
use App\Http\Requests\UserRequest;
use App\Enterprise;
use App\User;

class EnterpriseController extends Controller
{
   public function register(EnterpriseRequest $enterpriseRequest, UserRequest $userRequest)
   {

         $user = new User;
         $user->fill($userRequest->all());
         $user->password = bcrypt($userRequest->password);
         $user->profile_type  = 'Enterprise';

         $email = User::where('email','=',$userRequest->email)->first();

         if ($email) {

            return response()->json([
                'success' => false,
                'message' => '"' . $userRequest->email . '" already in use, try again. '        
            ], 200);

         }else {

            $enterprise = new Enterprise;
            $enterprise->fill($enterpriseRequest->all());
            $enterprise->save();

            $user->profile_id = $enterprise->id;
            $user->save();
         }

   }
         
      
   public function update(EnterpriseRequest $enterpriseRequest, UserRequest $userRequest)
   {  
      $user_update = User::findOrFail(auth()->user()->id);
      if ($userRequest->email == auth()->user()->email)
      {         
          $user_is_updated = $user_update->update($userRequest->only('username','password'));     
      }
      else
      {  
          $userRequest->validate([
          'email' => 'string|email|max:255|unique:users',
          ]);
          $user_is_updated = $user_update->update($userRequest->only('email','username','password'));
      }
      $enterprise_update =Enterprise::findOrFail(auth()->user()->profile_id);
      
      $enterprise_is_updated = $enterprise_update->update($enterpriseRequest->except('id')); 
      if($user_is_updated || $enterprise_is_updated)
      {
          return response()->json([
              'message'=> 'PROFILE SUCCESSFULLY UPDATED !',
              'data_user' => $user_update->only('email','username'),
              'data_enterprise' => $enterprise_update->makeHidden(['id','created_at','updated_at','deleted_at'])
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

   public function get($id = NULL)
   {
    if ($id != NULL) {
        $enterprise = Enterprise::findOrFail($id);
    } else {
        if (auth()->user()->profile_type === 'Enterprise') {
            $enterprise = Enterprise::findOrFail(auth()->user()->profile_id);
        } else {
            return response()->json(['message' => 'ERROR : ENTER AN ENTERPRISE ID'], 401);
        }
    }
    return response([
        'data' => $enterprise->makeHidden(['id','created_at','updated_at','deleted_at'])
     ],200);
     
   }
    
   public function destroy()
   {
        $enterprise = Enterprise::findOrFail(auth()->user()->profile_id)->delete(); 
        $user = User::where('profile_type','=','Enterprise')->where('profile_id','=',auth()->user()->profile_id)->delete();
        return redirect('auth.logout')->with('status', 'PROFILE SUCCESSFULLY DELETED!');  
   }

}
