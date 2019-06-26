<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Redirect;
use Auth;
use DB;
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
      return view('userlist', compact('users'));
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
}
