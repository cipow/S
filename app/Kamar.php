<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

Class Kamar extends Model {
  protected $table = 'kamars';

  public $timestamps = false;

  protected $hidden = ['username'];

  public function owner() {
    return $this->belongsTo('App\Owner','username','username');
  }

  public function previews() {
    return $this->hasMany('App\Preview','kamar_id','id');
  }

}
