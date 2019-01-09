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
    public function drink() {
        return $this->belongsTo('App\lan_drinks');
    }
    public function order() {
        return $this->belongsTo('App\lan_orders');
    }
}
