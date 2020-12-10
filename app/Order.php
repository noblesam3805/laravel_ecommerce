<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id','product_id','p_name', 'p_price', 'images', 'cat','desc','size','qty',
        'color','completed'
    ];

    public function user(){
        return $this->belongsTo('app/User');
    }
}
