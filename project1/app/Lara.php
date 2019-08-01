<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Lara extends Model 
{
        public $table = 'laras';
       protected $time = ['date'];
    protected $fillable = [
      'adress','location','duration','servername','link','room','name'
    ];
      public function duration() {
          $temp = Carbon::createFromDate($this->time);
          $now = Carbon::now('Europe/Berlin');
          $duration = $temp->diffInMinutes($now);
        //   $duration = Carbon::now('Europe/Berlin')->diffInMinutes($temp);
           
          

        return $duration;
    }
}
