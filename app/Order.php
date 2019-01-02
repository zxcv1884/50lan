<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'order_address',
        'order_at',
        'order_finish_at'
    ];
}
