<?php

namespace App\Exports;

use App\Po;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Auth;

use Illuminate\Http\Request;

class PoExport implements FromView
{
    public function view(): View
    {


      if (Auth::user()->accessLevel == '1') {

        return view('exports.po', [
            'poExports' => Po::select('pos.*', 'merchants.merchantName', 'users.name')
            ->leftJoin('merchants', 'pos.selectMerchant', '=', 'merchants.id')
            ->leftJoin('users', 'pos.u_id', '=', 'users.id')
            ->get()
        ]);

      }

      if (Auth::user()->accessLevel == '2') {

        return view('exports.po', [
            'poExports' => Po::select('pos.*', 'merchants.merchantName', 'users.name')
            ->where('companyId', Auth::user()->companyId)
            ->leftJoin('merchants', 'pos.selectMerchant', '=', 'merchants.id')
            ->leftJoin('users', 'pos.u_id', '=', 'users.id')
            ->get()
        ]);

      }

      if (Auth::user()->accessLevel == '3') {

        return view('exports.po', [
            'poExports' => Po::where('u_id', '=', Auth::user()->id)->where('created_at', 'LIKE', "%$date%")->get()
        ]);

      }



    }
}

// class PoExport implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//
//         $u_id = \Request::get('u_id');
//         $poPod = \Request::get('poPod');
//         $company_id = \Request::get('company_id');
//         $date = \Request::get('date');
//
//         if (Auth::user()->accessLevel == '1') {
//           return Po::all();
//         }
//
//         if (Auth::user()->accessLevel == '2') {
//           return Po::where('companyId', Auth::user()->companyId)->get();
//         }
//
//         if (Auth::user()->accessLevel == '3') {
//           return Po::where('u_id', '=', Auth::user()->id)->where('created_at', 'LIKE', "%$date%")->get();
//         }
//     }
// }
