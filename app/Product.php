<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //protected $table = 'products';    //

    protected $fillable = [
        'name', 'short', 'body', 'image', 'user_id',
    ];

  public function user(){
      return $this->belongsTo('\App\User', 'user_id');
  }
  public function scopeName($query, $name)
  {
    if($name)
        return $query->where('name', 'LIKE', "%$name%");

  }
}
