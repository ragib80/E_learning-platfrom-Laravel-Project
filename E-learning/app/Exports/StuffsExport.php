<?php

namespace App\Exports;

use App\Models\Stuff;
use Maatwebsite\Excel\Concerns\FromCollection;

class StuffsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Stuff::all();
    }
}