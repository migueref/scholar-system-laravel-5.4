<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrolment extends Model
{

  public function group()
  {
    return $this->belongsTo('App\Group');
  }
  public function student()
  {
    return $this->belongsTo('App\Student');
  }
}
