<?php

namespace App\Exports;

use App\Po;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

use Auth;

use Illuminate\Http\Request;

class PoExport implements FromView
{

    use Exportable;
    private $query;

    public function forDateFrom(string $exportDateFrom)
    {
        $this->exportDateFrom = $exportDateFrom;

        return $this;
    }

    public function forDateto(string $exportDateto)
    {
        $this->exportDateto = $exportDateto;

        return $this;
    }

    public function forCompany(string $company)
    {
        $this->company = $company;

        return $this;
    }

    // public function __construct(string $query)
    // {
    //      $this->query = $query;
    // }

    public function view(): View
    {

      // return Invoice::query()->whereYear('created_at', $this->year);

      return view('exports.po', [
          'poExports' => Po::select('pos.*', 'merchants.merchantName', 'users.name')
          ->leftJoin('merchants', 'pos.selectMerchant', '=', 'merchants.id')
          ->leftJoin('users', 'pos.u_id', '=', 'users.id')
          ->where('pos.companyId', $this->company)
          ->whereBetween('pos.created_at', [$this->exportDateFrom, $this->exportDateto])
          // ->whereMonth('pos.created_at', $this->query)
          ->get()
      ]);

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
