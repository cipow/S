<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

Class Kamar extends Model {
  protected $table = 'kamars';

  public $timestamps = false;

  public function owner() {
    return $this->belongsTo('App\Owner');
  }
}
