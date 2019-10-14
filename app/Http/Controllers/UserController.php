<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Company;
use Redirect;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Po;

class UserController extends Controller
{
  public function showUserList()
  {

    if (Auth::user()->accessLevel == '1') {
      // $users = User::all();
      $users = DB::table('users')->paginate(25);

    } elseif (Auth::user()->accessLevel == '2') {


      $users = User::where('companyId','=', Auth::user()->companyId)->paginate(25);


    } else {
      return Redirect::to('/');
    }
      return view('userlist', compact('users', 'compName'));
  }

  public function account()
  {

      return view('account');
  }

  public function removeUser($id)
  {

      $user = User::find($id);

      $user->delete();

      return Redirect::to('userlist')->with('message', 'User removed');
  }

  public function disableUser($id)
  {

      User::where('id', $id)
      ->update(['disabled' => '1']);

      return Redirect::to('userlist')->with('message', 'User disabled');
  }

  public function enableUser($id)
  {

      User::where('id', $id)
      ->update(['disabled' => '']);

      return Redirect::to('userlist')->with('message', 'User enabled');
  }



  public function edit($id)
    {





        if (Auth::user()->accessLevel == '1') {
          // $users = User::all();
          $user = User::where('id','=',$id)->firstOrFail();

        } elseif (Auth::user()->accessLevel == '2') {


          $user = User::where('id','=',$id)->where('companyId','=', Auth::user()->companyId)->firstOrFail();


        } else {

          return Redirect::to('/');

        }


        return view('auth.edit', compact('user'));
    }

  public function update($id, Request $request)
  {
      $this->validate(request(), [
          'name' => 'required',
          'email' => 'required|email',
          // 'password' => 'required|min:6|confirmed'
      ]);

      $editUser = User::findOrFail($id);

      $newPassword = $request->get('password');

      if(empty($newPassword)){
        $input = $request->except('password');
      } else {

        $request['password'] = Hash::make($request['password']);
        $input = $request->all();

      }



      $editUser->fill($input)->save();

      return Redirect::to("/users/$id")
      ->with('message', 'User successfully edited');
  }



}
