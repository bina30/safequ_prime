<?php

namespace App\Models;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ProductErrorsExport implements FromCollection, WithMapping, WithHeadings, WithEvents
{
    private $rowData = [];

    public function __construct($request)
    {
        $this->rowData = $request;
    }

    public function collection()
    {
        return $this->rowData;
    }

    public function headings(): array
    {
        return [
            'UniqueId',
            'ItemName',
            'Quantity',
            'Price',
            'FarmLocation',
            'Variety',
            'MinOrderQty',
            'StartDate (MM/DD/YYYY)',
            'EndDate (MM/DD/YYYY)',
            'Comment',
        ];
    }

    /**
    * @var Product $product
    */
    public function map($product): array
    {
        return [
            $product['uniqueid'],
            $product['itemname'],
            $product['quantity'],
            $product['price'],
            $product['farmlocation'],
            $product['variety'],
            $product['minorderqty'],
            $product['startdate_mmddyyyy'],
            $product['enddate_mmddyyyy'],
            $product['comment'],
        ];
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A1:J1')
                    ->getFont()
                    ->setBold(true);

            },
        ];
    }
}
