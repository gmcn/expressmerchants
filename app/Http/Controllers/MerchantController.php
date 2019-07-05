<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Merchant;
use Redirect;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;
use Response;

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
    // $results = Merchant::all();
    //
    // $xml = new \XMLWriter();
    // $xml->openMemory();
    // $xml->startDocument();
    // $xml->startElement('markers');
    // foreach($results as $result) {
    //     $xml->startElement('marker');
    //     $xml->writeAttribute('id', $result->id);
    //     $xml->writeAttribute('name', $result->merchantName);
    //     $xml->writeAttribute('address', $result->merchantAddress1);
    //     $xml->writeAttribute('lat', $result->lat);
    //     $xml->writeAttribute('lng', $result->lng);
    //     $xml->writeAttribute('distance', $result->distance);
    //     $xml->endElement();
    // }
    // $xml->endElement();
    // $xml->endDocument();
    //
    // $content = $xml->outputMemory();
    // $xml = null;
    //
    // return response($content)->header('Content-Type', 'text/xml');


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
