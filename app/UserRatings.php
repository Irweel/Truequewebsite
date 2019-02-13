<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRatings extends Model
{
    protected $table = 'userratings';    //

    protected $fillable = [
        'user_id', 'rating',
    ];

    public function user_id(){
        return $this->belongsTo('\App\User', 'id');
    }



}
