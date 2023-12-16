<?php

namespace App\Exports;

use App\Models\Karang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class KarangExport implements FromView
{

    public function view(): View
    {
        return view('dist.downloads.excel', [
            'karangs' => Karang::all()
        ]);
    }
}
