<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Merchant;
use Redirect;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;
use Response;

use App\Exports\MerchantExport;
use Maatwebsite\Excel\Facades\Excel;

class MerchantController extends Controller
{

  public function addMerchant()
  {

    if (Auth::user()->accessLevel != '1') {
    return Redirect::to('/');
    } else {
      return view('merchant-create');
    }


  }

  public function createMerchant(Request $request)
  {

    Merchant::create($request->toArray());

    return Redirect::to('merchant-list')->with('message', 'Merchant successfully added');

  }

  public function findMerchant()
  {

    Excel::store(new MerchantExport, 'public/em.csv');

    return view('merchant-find', compact('results', 'content'));


  }

  public function resultsMerchant()
  {

    return view('merchant-find');

  }

  public function showMerchant()
  {

      $merchants = DB::table('merchants')->paginate(25);
      // Merchant::all()->paginate(25);

      if (Auth::user()->accessLevel != '1') {
        return Redirect::to('/');
      } else {
        return view('merchant-list', compact('merchants'));
      }


  }

  public function removeMerchant($id)
  {

      $merchants = Merchant::find($id);

      $merchants->delete();

      return Redirect::to('merchant-list')->with('message', 'Merchant removed');
  }

}
