<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'program_name', 'path_img', 'description', 'price', 'user_id'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function members()
  {
    return $this->hasMany('App\Member');
  }
}
