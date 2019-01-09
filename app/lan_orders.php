<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lan_orders extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'order_address',
        'order_at',
        'order_finish_at'
    ];
    public function order_drinks() {
        return $this->hasMany('App\lan_order_drinks','order_id');
    }
    public function delete() {
        $this->order_drinks()->delete();
        return parent::delete();
    }
}
