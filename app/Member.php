<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
  protected $fillable = [
      'full_name', 'email', 'dob', 'gender', 'come_from', 'address', 'phone_number', 'program_id', 'status', 'masterpiece', 'user_id'
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
