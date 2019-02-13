<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    //protected $table = 'products';    //

    protected $fillable = [
       'user_from', 'user_to', 'status',
    ];

    public function userFrom(){
        return $this->belongsTo('\App\User', 'user_from');
    }

    public function userTo(){
        return $this->belongsTo('\App\User', 'user_to');
    }

    public function user()
    {
        return $this->belongsTo("App\User");
    }


}
