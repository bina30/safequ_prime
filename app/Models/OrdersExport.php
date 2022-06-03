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
        $orders = OrderDetail::orderBy('id', 'desc');
        if ($this->search != null) {
            $orders = $orders->whereHas('order', function ($query) {
                $query->where('code', 'like', '%' . $this->search . '%');
            });
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
            'OrderCode',
            'Date',
            'DeliveryDate',
            'Name',
            'Phone',
            'Community',
            'FlatNo',
            'Product',
            'Category',
            'Sub Category',
            'Variation',
            'FarmLocation',
            'Qty',
            'Price',
            'TotalPrice',
            'PaymentStatus',
            'PaymentType',
            'DeliveryStatus',
        ];
    }

    /**
    * @var Order $order
    */
    public function map($order): array
    {
        $userName = isset($order->order) && isset($order->order->user) ? $order->order->user->name : '--';
        $userPhone = isset($order->order) && isset($order->order->user) ? str_replace('+91', '', $order->order->user->phone) : '--';
        $communityName = isset($order->product) && isset($order->product->user) ? $order->product->user->name : $order->seller_id;
        $flatNo = isset($order->order) && isset($order->order->user) ? $order->order->user->address : '--';
        $parentCategory = isset($order->product) && isset($order->product->parent_category) ? $order->product->parent_category->name : '--';
        $subCategory = isset($order->product) && isset($order->product->category_id) ? $order->product->category->name : '--';
        $farmLocation = isset($order->product) ? $order->product->manufacturer_location : '--';

        $deliveryDate = '--';
        if (isset($order->product_stock) && isset($order->product_stock->purchase_end_date)) {
            $deliveryDate = date('d-m-Y', strtotime($order->product_stock->purchase_end_date. '+' . intval($order->product_stock->est_shipping_days) . ' days'));
        }

        return [
            $order->order->code,
            $order->created_at,
            $deliveryDate,
            $userName,
            $userPhone,
            $communityName,
            $flatNo,
            $order->product->name,
            $parentCategory,
            $subCategory,
            $order->product->variation,
            $farmLocation,
            $order->quantity,
            number_format(floatval($order->price / $order->quantity), 2),
            $order->price,
            $order->payment_status,
            $order->order->payment_type,
            $order->delivery_status,
        ];
    }
}
