<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Lara extends Model
{
    //
      public function duration() {
          $temp = $this->time;
          $duration = $temp->diffInMinutes(Carbon::now('Europe/Berlin'));
        //   $duration = Carbon::now('Europe/Berlin')->diffInMinutes($temp);
           
          

        return $duration;
    }
}
