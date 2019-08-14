<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;
use App\Http\Requests\UserRequest;
use App\User;
use App\Member;
use App\Member_employee;
use Aoo\Member_enterprise;


class MemberController extends Controller
{
   public function register(MemberRequest $memberRequest, UserRequest $userRequest)
   {
      $user = new User;
      $user->fill($userRequest->all());
      $user->password      = bcrypt($userRequest->password);
      $user->profile_type  = 'Member';

      $email = User::where('email','=',$userRequest->email)->first();
      if ($email) {
         return response()->json([
             'success' => false,
             'message' => '"' . $userRequest->email .  '" already in use, try again.) '        
         ], 200);

      }else {
         $member = new Member;
         $member->fill($memberRequest->all());
         $member ->save();
         $user->profile_id = $member->id;
         $user->save();
      }
       
   }
   
   public function update(MemberRequest $memberRequest, UserRequest $userRequest)
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
      $member_update =Member::findOrFail(auth()->user()->profile_id);
      
      $member_is_updated = $member_update->update($memberRequest->except('id')); 
      if($user_is_updated || $member_is_updated)
      {
          return response()->json([
              'message'=> 'PROFILE SUCCESSFULLY UPDATED !',
              'data_user' => $user_update->only('email','username'),
              'data_member' => $member_update->makeHidden(['id','created_at','updated_at','deleted_at'])
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
      $member = Member::findOrFail($id);
    } else {

         if (auth()->user()->profile_type === 'Member') {
            $member = Member::findOrFail(auth()->user()->profile_id);
         } else {
            return response()->json(['message' => 'ERROR : ENTER A MEMBER ID'], 401);
         }
         
    }
    return response([
        'data' => $member->makeHidden(['id','created_at','updated_at','deleted_at'])
     ], 200);
     
   } 

   public function destroy()
   {
      $member = Member::findOrFail(auth()->user()->profile_id)->delete(); 
      $user = User::where('profile_type','=','Member')->where('profile_id','=',auth()->user()->profile_id)->delete();
      return redirect('auth.logout')->with('status', 'PROFILE SUCCESSFULLY DELETED!');   
   }

   public function evaluateEmployee(Request $request)
   {
      $member_employee= new Member_employee;
      $member_employee ->evaluation = $request ->evaluation;
      $member_employee ->save();
   }

   public function evaluateEnterprise(Request $request)
   {
      $member_enterprise = new Member_enterprise;
      $member_enterprise ->evaluation = $request ->evaluation;
      $member_enterprise ->save();
   }
}
