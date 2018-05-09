<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
  protected $fillable = [
      'name', 'email', 'come_from', 'address', 'phone_number', 'program_id', 'generation', 'status', 'user_id'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function program()
  {
    return $this->belongsTo('App\Program');
  }
}
