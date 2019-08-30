<?php

namespace App\Exports;

use App\Products;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings

{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Products::all();
    }

    public function headings(): array
    {
        return [
            'Id',
            'User Id',
            'Product Name',
            'Type',
            'Description',
            'Weight',
            'Weight Type',
            'Image Name',
            'Created At',
            'Updated At'
        ];
    }
}
