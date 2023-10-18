<?php

namespace App\Exports;

use App\Models\FavoriteSymbol;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FavoriteSymbolExport implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        return FavoriteSymbol::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'symbol',
            'price',
            'created_at',
            'updated_at'
        ];
    }
}
