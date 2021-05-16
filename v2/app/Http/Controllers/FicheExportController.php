<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Exports\FicheExport;
use Maatwebsite\Excel\Facades\Excel;

class FicheExportController extends Controller
{
    public function export() 
    {
        return Excel::download(new FicheExport, 'fiche.xlsx');
    }
}
