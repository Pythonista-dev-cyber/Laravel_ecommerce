<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    protected $fillable=[
        'order_date',
        'order_no',
        'order_items',
        'grand_total',
        'customer_name',
        'customer_email',
        'customer_phone',
        'shipping_address',
        'payment_type',
        'payment_receipt',
        'payment_status',
        'order_status',
    ];


      
}
