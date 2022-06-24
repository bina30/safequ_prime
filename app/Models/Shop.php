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
        return $this->hasMany(Order::class, 'seller_id', 'user_id');
    }

}
