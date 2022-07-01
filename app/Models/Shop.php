<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customers()
    {
        return $this->belongsTo(User::class, 'user_id', 'joined_community_id')->where('user_type', 'customer');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'seller_id', 'user_id')->where(function ($query) {
            $query->where('payment_status', 'paid')->orWhere(function ($query) {
                $query->where('added_by_admin', 1)->where('payment_status', 'unpaid');
            });
        });
    }

    public function unpaid_orders()
    {
        return $this->hasMany(Order::class, 'seller_id', 'user_id')->where('added_by_admin', 1)->where('payment_status', 'unpaid');
    }

}
