<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'p_name', 'p_price', 'images', 'cat','desc','size',
    ];

    public function user(){
        return $this->belongsTo('app/User');
    }
}
