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
           $duration = Carbon::now('Europe/Berlin')->diffInMinutes($temp);
          

        return $duration;
    }
}
