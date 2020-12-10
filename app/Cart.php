<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id','product_id','p_name', 'p_price', 'images', 'cat','desc','size','qty','color',
        'total','status'
    ];

    public function user(){
        return $this->belongsTo('app/User');
    }
}
