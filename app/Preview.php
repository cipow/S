<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

Class Preview extends Model {
  protected $table = 'previews';

  public $timestamps = false;

  public function kamar() {
    return $this->belongsTo('App\Kamar');
  }

}
