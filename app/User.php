<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
  /**
  *Send password reset notification.
  *
  *@param string $token
  *@return void
  */
  public function sendPasswordResetNotification($token)
  {
    $this->notify(new ResetPasswordNotification($token));
  }

  public function products(){
      return $this->hasMany('\App\Product');
  }

  public function exchange()
    {
        return $this->hasMany("App\Exchange");
    }

  public function scopeName($query, $name)
  {
    if($name)
        return $query->where('name', 'LIKE', "%$name%");

 } 
}
