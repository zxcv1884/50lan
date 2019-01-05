<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lan_order_drinks extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'drink_id',
        'drink_ice',
        'drink_sugar',
        'order_id'
    ];
}
