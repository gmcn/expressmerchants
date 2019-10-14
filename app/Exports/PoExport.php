<?php

namespace App\Exports;

use App\Po;
use Maatwebsite\Excel\Concerns\FromCollection;
use Auth;

use Illuminate\Http\Request;

class PoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $u_id = \Request::get('u_id');
        $poPod = \Request::get('poPod');
        $company_id = \Request::get('company_id');
        $date = \Request::get('date');

        if (Auth::user()->accessLevel == '1') {
          return Po::all();
        }

        if (Auth::user()->accessLevel == '2') {
          return Po::where('companyId', Auth::user()->companyId)->get();
        }

        if (Auth::user()->accessLevel == '3') {
          return Po::where('u_id', '=', Auth::user()->id)->where('created_at', 'LIKE', "%$date%")->get();
        }
    }
}
