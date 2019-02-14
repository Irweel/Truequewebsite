<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRatings extends Model
{
     public $table = "userratings";    //

    protected $fillable = [
        'user_from', 'user_to', 'rating',
    ];

    public function user_from(){
        return $this->belongsTo('\App\User', 'user_from');
    }

    public function user_to(){
        return $this->belongsTo('\App\User', 'user_to');
    }



}
