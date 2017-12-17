<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

Class Owner extends Model {

  protected $table = 'owners';

  protected $hidden = ['username','password', 'api_token'];

  public $timestamps = false;

  public function kamars() {
    return $this->hasMany('App\Kamar', 'username', 'username');
  }
}
