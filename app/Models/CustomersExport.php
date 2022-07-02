<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomersExport implements FromCollection, WithMapping, WithHeadings
{
    public $delivery_status, $filter_date, $search;

    public function __construct($request)
    {
        $this->search = $request->search;
    }

    public function collection()
    {
        $users = User::orderBy('id', 'desc')->where('user_type', 'customer');
        if ($this->search != null) {
            $sort_search = $this->search;
            $users->where(function ($q) use ($sort_search){
                $q->where('name', 'like', '%'.$sort_search.'%')->orWhere('email', 'like', '%'.$sort_search.'%');
            });
        }

        return $users->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Community',
            'Phone',
            'Address',
            'WalletBalance',
            'ReferredBy',
            'TotalOrder',
            'TotalSalesAmount',
            'TotalPaid',
            'TotalPending'
        ];
    }

    /**
    * @var User $user
    */
    public function map($user): array
    {
        $totalSalesAmount = ($user->orders->count() > 0 ? $user->all_order_details->sum('price') : '0');
        $totalPaid = ($user->orders->count() > 0 ? $user->order_details->sum('price') : '0');
        $totalPending = ($user->orders->count() > 0 ? $user->unpaid_order_details->sum('price') : '0');
        $communityName = isset($user->user_community) && !empty($user->user_community) ? $user->user_community->name : '--';
        $referredBy = isset($user->referred_user) && !empty($user->referred_user) ? $user->referred_user->name : '--';
        return [
            $user->name,
            $communityName,
            str_replace('+91', '', $user->phone),
            $user->address,
            $user->balance,
            $referredBy,
            ($user->orders->count() > 0 ? $user->orders->count() : '0'),
            ($totalSalesAmount ? $totalSalesAmount : '0.00'),
            ($totalPaid ? $totalPaid : '0.00'),
            ($totalPending ? $totalPending : '0.00')
        ];
    }
}
