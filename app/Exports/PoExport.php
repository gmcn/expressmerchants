<?php

namespace App\Exports;

use App\Po;
use Maatwebsite\Excel\Concerns\FromCollection;

class PoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Po::all();
    }
}
