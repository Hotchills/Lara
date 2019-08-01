<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Lara extends Model 
{
        public $table = 'laras';
        protected $dates=['created_at', 'updated_at','time'];
    protected $fillable = [
      'adress','location','duration','servername','link','room','name','time'
    ];
      public function duration() {
          $temp = Carbon::parse($this->time,'Europe/Berlin');
          $now = Carbon::now('Europe/Berlin');
          $duration = $now->diffInSeconds($temp);
        //   $duration = Carbon::now('Europe/Berlin')->diffInMinutes($temp);
           $duration=$duration/60;
        return $duration;
    }
}
