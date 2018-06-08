<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booked extends Model
{
  protected $fillable = [
      'full_name', 'email', 'dob', 'gender', 'come_from', 'address', 'phone_number', 'program_id', 'description'
  ];

  public function program()
  {
    return $this->belongsTo('App\Program');
  }
}
