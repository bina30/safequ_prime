<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithMapping, WithHeadings
{
    public $delivery_status, $filter_date, $search;

    public function __construct($request)
    {
        $this->delivery_status = $request->delivery_status;
        $this->filter_date = $request->filter_date;
        $this->search = $request->search;
    }

    public function collection()
    {
        return Order::all();
    }

    public function headings(): array
    {
        return [
            'name',
            'description',
            'added_by',
            'user_id',
            'category_id',
            'brand_id',
            'video_provider',
            'video_link',
            'unit_price',
            'purchase_price',
            'unit',
            'current_stock',
            'meta_title',
            'meta_description',
        ];
    }

    /**
    * @var Order $order
    */
    public function map($order): array
    {
        dd($order);
        $qty = 0;
        /*foreach ($product->stocks as $key => $stock) {
            $qty += $stock->qty;
        }
        return [
            $product->name,
            $product->description,
            $product->added_by,
            $product->user_id,
            $product->category_id,
            $product->brand_id,
            $product->video_provider,
            $product->video_link,
            $product->unit_price,
            $product->purchase_price,
            $product->unit,
            $qty,
        ];*/
    }
}
