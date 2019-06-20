<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Po;
use Redirect;
use DB;
use Illuminate\Support\Facades\Input;
use Auth;
use Validator;
use Mail;
use App\User;

class PoController extends Controller
{

  public function addPo()
  {

    return view('po-create');

  }

  public function createPo(Request $request)
  {

    $this->validate($request, [
        'poType' => 'required|max:255',
        'poPurpose' => 'required|max:255',
        'poProject' => 'required|max:255',
        'poProjectLocation' => 'required|max:255',
        ]);

    Po::create($request->toArray());

    //email fuction to come, if validation above it met
    // Mail::send( 'emails.voucher', compact('voucherForm'), function( $message ) use ($registrationForm)
    //     {
    //         $message->from('noreply.tti@horseware.com', $name = 'Horseware');
    //         $message->to( $registrationForm['email'] )->subject( 'Your Horseware Turnout Trade-In Voucher Code;' );
    //     });

    return Redirect::to('po-list')->with('message', 'PO successfully added' );

  }

  public function listPo(Request $search)
  {

    $adminusr = User::where('accessLevel', '2')->where('companyId', Auth::user()->companyId)->first();

    $search = \Request::get('search');

    if (Auth::user()->accessLevel == '1') {


      if ($search != "") {
        $pos = Po::select('pos.*', 'companies.companyName', 'users.name')
        ->where('pos.id','LIKE',"%$search%")
        ->orwhere('pos.poType','LIKE',"%$search%")
        ->orwhere('pos.poPurpose','LIKE',"%$search%")
        ->orwhere('pos.poProject','LIKE',"%$search%")
        ->orwhere('pos.poProjectLocation','LIKE',"%$search%")
        ->leftJoin('companies', 'pos.companyId', '=', 'companies.id')
        ->leftJoin('users', 'pos.u_id', '=', 'users.id')
        ->orWhere('companies.companyName','LIKE',"%$search%")
        ->orWhere('users.name','LIKE',"%$search%")
        ->paginate(1000);
      } else {
        $pos = DB::table('pos')
        ->join('companies', 'pos.companyId', '=', 'companies.id')
        ->select('pos.*', 'companies.companyName')
        ->paginate(25);
      }


      } elseif (Auth::user()->accessLevel == '2') {
        $pos = DB::table('pos')
        ->join('companies', 'pos.companyId', '=', 'companies.id')
        ->select('pos.*', 'companies.companyName')
        ->where('companyId', '=', Auth::user()->companyId)
        ->paginate(25);
        // ->get();
      } else {
        $pos = DB::table('pos')
        ->where('u_id', '=', Auth::user()->id)
        ->paginate(25);
        // ->get();
      }

      return view('po-list', compact('pos', 'search', 'adminusr'));
  }

  public function showPo($id)
  {

    $po = Po::where('id','=',$id)->firstOrFail();

    if (Auth::user()->accessLevel != '1') {
      return Redirect::to('/po-list');
    } else {
      return view('po-edit', compact('po'));
    }

  }

  public function editPo($id, Request $request)
  {

    $editPo = Po::findOrFail($id);
    $input = $request->all();

    $destinationPath = 'uploads/'; // upload path
    $file = Input::file('poPod');
    // $fileName = $file->getClientOriginalName();

    if (Input::hasFile('poPod'))
    {
      $request->file('poPod')->move($destinationPath, $id . '.jpg');
    }

    $editPo->fill($input)->save();

    return Redirect::to('/po-list')
    ->with('message', 'Po successfully edited');

  }

}
