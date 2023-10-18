<?php

namespace App\Http\Controllers;

use App\Exports\FavoriteSymbolExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FavoriteSymbolController extends Controller
{
    public function export(): BinaryFileResponse
    {
        return Excel::download(new FavoriteSymbolExport(), 'fav_symbols.xlsx');
    }
}
