<?php

namespace App\Exports;

use App\Models\Signboard;
use Maatwebsite\Excel\Concerns\FromCollection;

class SignboardExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Signboard::all();
    }
}
