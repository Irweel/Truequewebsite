<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExchangeDetails extends Model
{
    protected $table = 'exchangedetails';    //

    protected $fillable = [
        'exchange_id', 'product_id',
    ];

    public function exchange_id(){
        return $this->belongsTo('\App\Exchange', 'exchange_id');
    }

    public function product_id(){
        return $this->belongsTo('\App\Product', 'product_id');
    }

}
