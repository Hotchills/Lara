<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Lara extends Model
{
    //
      public function duration() {
          $temp = $this->time;
        //  $duration = $temp->timediffInSeconds(Carbon::now());
           $duration = Carbon::now()->timediffInSeconds($temp);
          
          $duration=$duration/360;
        return $duration;
    }
}
