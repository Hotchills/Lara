<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lara extends Model
{
    //
      public function duration() {
          $temp = $this->time;
          $duration = $temp->timediffInSeconds(Carbon\Carbon::now());
          $duration=$duration/360;
        return $duration;
    }
}
