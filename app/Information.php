<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'title', 'description', 'path_img', 'user_id'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
