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
use App\Company;
use App\Merchant;

use App\Exports\PoExport;
use Maatwebsite\Excel\Facades\Excel;

class PoController extends Controller
{

  public function export()
  {
      Excel::store(new PoExport, 'public/po_export.xlsx');
      return Excel::download(new PoExport, 'po_export.xlsx');
  }

  public function addPo()
  {

    $merchants = Merchant::all();

    return view('po-create', compact('merchants'));

  }

  public function createPo(Request $request)
  {

    $this->validate($request, [
        'poType' => 'required|max:255',
        'poPurpose' => 'required|max:255',
        // 'poProject' => 'required|max:255',
        'poProjectLocation' => 'required|max:255',
        ]);

    $creatPO = Po::create($request->toArray());

    $poUser = User::all()->where('id', $request->input('u_id'))->first();

    $poCompany = Company::all()->where('id', $request->input('companyId'))->first();

    $poAdminCompany = User::select('email')->where('companyId', $request->input('companyId'))->where('accessLevel', '2')->first();

    $creatPOmechant = Merchant::all()->where('id', $request->input('selectMerchant'))->first();

    $creatPOinputmechant = $request->input('inputMerchant');


    //email function to come, if validation above it met
    Mail::send( 'emails.po', compact('creatPO', 'creatPOmechant', 'creatPOinputmechant', 'poUser', 'poCompany', 'poAdminCompany'), function( $message ) use ($request, $poAdminCompany)
        {
            $message->from('katie@express-merchants.co.uk', $name = 'Express Merchants');


            if($_SERVER["REMOTE_ADDR"]=='127.0.0.1') {

              $message->to( 'gary@cornellstudios.com' )->subject( 'A Purchase Order has been created' );

            } else {

              $message->to( 'Katie@cs-ireland.co.uk' )->subject( 'A Purchase Order has been created' );

            }

            if ($poAdminCompany) {

              $message->cc( $poAdminCompany->email )->subject( 'A Purchase Order has been created' );

            }


            $message->bcc( 'gary@cornellstudios.com' )->subject( 'A Purchase Order has been created' );
        });

    return Redirect::to('po-created')->with('message', $creatPO->id )->with('poType', $creatPO->poType );

  }

  public function createdPo()
  {

    return view('po-created');

  }

  public function listPo_bkup(Request $search)
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
        ->orderBy('id', 'desc')
        ->paginate(1000);
      } else {
        $pos = DB::table('pos')
        ->join('companies', 'pos.companyId', '=', 'companies.id')
        ->select('pos.*', 'companies.companyName')
        ->orderBy('id', 'desc')
        ->paginate(15);
      }


      } elseif (Auth::user()->accessLevel == '2') {


        if ($search != "") {
          $pos = Po::select('pos.*', 'companies.companyName', 'users.name')
          ->where('pos.companyId', '=', Auth::user()->companyId)
          ->where('pos.id','LIKE',"%$search%")
          ->orwhere('pos.poType','LIKE',"%$search%")
          ->orwhere('pos.poPurpose','LIKE',"%$search%")
          ->orwhere('pos.poProject','LIKE',"%$search%")
          ->orwhere('pos.poProjectLocation','LIKE',"%$search%")
          ->leftJoin('companies', 'pos.companyId', '=', 'companies.id')
          ->leftJoin('users', 'pos.u_id', '=', 'users.id')
          ->orWhere('companies.companyName','LIKE',"%$search%")
          ->orWhere('users.name','LIKE',"%$search%")
          ->orderBy('id', 'desc')
          ->paginate(1000);
        } else {
          $pos = DB::table('pos')
          ->join('companies', 'pos.companyId', '=', 'companies.id')
          ->select('pos.*', 'companies.companyName')
          ->where('companyId', '=', Auth::user()->companyId)
          ->orderBy('id', 'desc')
          ->paginate(15);
          // ->get();
        }

      } else {

        if ($search != "") {
          $pos = Po::select('pos.*', 'companies.companyName', 'users.name')
          ->where('u_id', '=', Auth::user()->id)
          ->where('pos.id','LIKE',"%$search%")
          ->orwhere('pos.poType','LIKE',"%$search%")
          ->orwhere('pos.poPurpose','LIKE',"%$search%")
          ->orwhere('pos.poProject','LIKE',"%$search%")
          ->orwhere('pos.poProjectLocation','LIKE',"%$search%")
          ->leftJoin('companies', 'pos.companyId', '=', 'companies.id')
          ->leftJoin('users', 'pos.u_id', '=', 'users.id')
          ->orWhere('companies.companyName','LIKE',"%$search%")
          ->orWhere('users.name','LIKE',"%$search%")
          ->orderBy('id', 'desc')
          ->paginate(1000);
        } else {
          $pos = DB::table('pos')
          ->where('u_id', '=', Auth::user()->id)
          ->orderBy('id', 'desc')
          ->paginate(15);
          // ->get();
        }


      }

      return view('po-list', compact('pos', 'search', 'adminusr'));
  }

  public function listPo(Request $request)
  {

    $adminusr = User::where('accessLevel', '2')->where('companyId', Auth::user()->companyId)->first();

        // Sets the parameters from the get request to the variables.
        $u_id = \Request::get('u_id');
        $poPod = \Request::get('poPod');
        $poId = \Request::get('poId');
        $company_id = \Request::get('company_id');
        $poLocation = \Request::get('poLocation');
        $date = \Request::get('date');

        $query = Po::query();

        // $pos = DB::table('pos')
        // ->join('companies', 'pos.companyId', '=', 'companies.id')
        // ->select('pos.*', 'companies.companyName')
        // ->orderBy('id', 'desc')
        // ->paginate(15);

        if (Auth::user()->accessLevel == '1') {


          $users = User::all();
          $companies = Company::all();


          if ($u_id) {
            $query->where('u_id', '=', $u_id);
          }

          if ($poId) {
            $query->where('id', '=', $poId);
          }

          if($date) {
            $query->where('created_at', 'LIKE', "%$date%");
          }

          if ($company_id) {
            $query->where('companyId', '=', $company_id);
          }

          if ($poPod) {
            $query->where('poPod', '=', "");
          }

          if ($poLocation) {
            $query->where('poProjectLocation', 'LIKE', "%$poLocation%");
          }

        }

        if (Auth::user()->accessLevel == '2') {


          $users = User::where('companyId', Auth::user()->companyId)->get();



          if ($u_id) {
            $query->where('u_id', '=', $u_id);
          }

          if ($poId) {
            $query->where('id', '=', $poId);
          }

          if($date) {
            $query->where('created_at', 'LIKE', "%$date%");
          }

          if ($poPod) {
            $query->where('poPod', '=', "");
          }

          if ($poLocation) {
            $query->where('poProjectLocation', 'LIKE', "%$poLocation%");
          }

          $query->where('companyId', '=', Auth::user()->companyId);


        }

        if (Auth::user()->accessLevel == '3') {

          if ($u_id) {
            $query->where('u_id', '=', $u_id);
          }

          if ($poId) {
            $query->where('id', '=', $poId);
          }

          if($date) {
            $query->where('created_at', 'LIKE', "%$date%");
          }

          if ($poPod) {
            $query->where('poPod', '=', "");

          }

          if ($poLocation) {
            $query->where('poProjectLocation', 'LIKE', "%$poLocation%");
          }

          $query->where('companyId', '=', Auth::user()->companyId);
          $query->where('u_id', '=', Auth::user()->id);

          // $query->where('poInvoice', '=', "");
          // $query->where('poPod', '=', "");
          // $query->where('poCompanyPo', '=', "");


        }

        $query->orderBy('id', 'desc');

        $pos = $query->paginate(50);

      return view('po-list', compact('pos', 'date', 'company_id', 'u_id', 'poId', 'poPod', 'poLocation', 'users', 'companies', 'adminusr'));

  }

  public function showPo($id)
  {

    // $po = Po::where('id','=',$id)->firstOrFail();

    $po = Po::select('pos.*', 'companies.companyName', 'users.name', 'merchants.merchantName')
    ->leftJoin('companies', 'pos.companyId', '=', 'companies.id')
    ->leftJoin('merchants', 'pos.selectMerchant', '=', 'merchants.id')
    ->leftJoin('users', 'pos.u_id', '=', 'users.id')
    ->where('pos.id','=',$id)->firstOrFail();

    // if (Auth::user()->accessLevel != '1') {
    //   return Redirect::to('/po-list');
    // } else {
      return view('po-edit', compact('po'));
    // }

  }

  public function editPo($id, Request $request)
  {

    $this->validate($request, [
        'poPod' => 'file|max:6000',
        ]);

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
    ->with('message', 'P/O successfully edited');

  }

}
