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
        $orders = Order::orderBy('id', 'desc');
        if ($this->search != null) {
            $sort_search = $this->search;
            $orders = $orders->where('code', 'like', '%' . $sort_search . '%');
        }
        if ($this->delivery_status != null) {
            $orders = $orders->where('delivery_status', $this->delivery_status);
        }
        if ($this->filter_date != null) {
            $orders = $orders->where('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $this->filter_date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $this->filter_date)[1])));
        }

        return $orders->get();
    }

    public function headings(): array
    {
        return [
            'SrNo',
            'OrderCode',
            'Date',
            'User',
            'Seller',
            'ShippingAddress',
            'DeliveryStatus',
            'PaymentType',
            'PaymentStatus',
            'PaymentDetails',
            'GrandTotal',
        ];
    }

    /**
    * @var Order $order
    */
    public function map($order): array
    {
        $userName = isset($order->user) ? $order->user->name : $order->user_id;
        $sellerName = isset($order->seller) ? $order->seller->name : $order->seller_id;

        return [
            $order->id,
            $order->code,
            $order->created_at,
            $userName,
            $sellerName,
            $order->shipping_address,
            $order->delivery_status,
            $order->payment_type,
            $order->payment_status,
            $order->payment_details,
            $order->grand_total,
        ];
    }
}
