<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lan_drinks extends Model
{
    //
    // 預設情況下，protected $primaryKey = '''id'
    protected $primaryKey = 'id';

    protected $fillable = [
        'type_id',
        'drink',
        'drink_price'
    ];
    public function type() {
        return $this->belongsTo('App\lan_types');
    }
    public function order_drinks() {
        return $this->hasMany('App\lan_order_drinks','drink_id');
    }
    public function delete() {
        $this->order_drinks()->delete();
        return parent::delete();
    }
}
