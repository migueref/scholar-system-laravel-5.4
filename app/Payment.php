<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
  public function bank()
  {
    return $this->belongsTo('App\Bank');
  }
  public function module()
  {
    return $this->belongsTo('App\Module');
  }
  public function enrolment()
  {
    return $this->belongsTo('App\Enrolment');
  }
}
