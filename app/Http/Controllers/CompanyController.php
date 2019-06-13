<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;
use Redirect;
use Illuminate\Support\Facades\Input;
use Auth;
use Validator;
use Mail;
use DB;

class CompanyController extends Controller
{

  public function addCompany()
  {

    if (Auth::user()->accessLevel != '1') {
    return Redirect::to('/');
    } else {
      return view('create-company');
    }


  }

  public function createCompany(Request $request)
  {

    $this->validate($request, [
        'poType' => 'required|max:255',
        'poPurpose' => 'required|max:255',
        'poProject' => 'required|max:255',
        'poProjectLocation' => 'required|email|max:255',
        ]);

    Company::create($request->toArray());

    return Redirect::to('company-list')->with('message', 'Company successfully added');

  }

  public function showCompany()
  {

      // $companies = Company::all();
      $companies = DB::table('companies')->paginate(25);

      if (Auth::user()->accessLevel != '1') {
      return Redirect::to('/');
      } else {
        return view('company-list', compact('companies'));
      }


  }

  public function removeCompany($id)
  {

      $company = Company::find($id);

      $company->delete();

      return Redirect::to('company-list')->with('message', 'Company removed');
  }

}
