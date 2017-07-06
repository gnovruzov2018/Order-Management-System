<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderDetail()
    {
        return $this->hasOne('App\OrderDetail');
    }
    public function shipper(){
        return $this->belongsTo('App\Shipper');
    }
    public function customer(){
        return $this->belongsTo('App\Customer');
    }
    public function Employee(){
        return $this->belongsTo('App\Employee');
    }
}
