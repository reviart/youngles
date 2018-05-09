<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password', 'path_img', 'job'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
      'last_login'
    ];

    public function getLastLoginAttribute()
    {
        return Carbon::parse($this->attributes['last_login'])
           ->format('d, M Y H:i');
    }

    public function programs()
    {
      return $this->hasMany('App\Program');
    }

    public function informations()
    {
      return $this->hasMany('App\Information');
    }

    public function members()
    {
      return $this->hasMany('App\Member');
    }
}
