<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lan_types extends Model
{
    //
    // 預設情況下，protected $primaryKey = '''id'
    protected $primaryKey = 'id';

    protected $fillable = [
        'type',
    ];

}
