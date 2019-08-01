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
          $temp = Carbon::parse($this->time);
          $now = Carbon::now();
          $duration = $now->diffInMinutes($temp);
        //   $duration = Carbon::now('Europe/Berlin')->diffInMinutes($temp);
           $duration=$duration;
        return $duration;
    }
}
