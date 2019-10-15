<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Click extends Model
{
  public function getCreatedAtAttribute($timestamp)
  {
    return Carbon::parse($timestamp)->timezone('Europe/Moscow')->format('d.m.Y H:i:s');
  }

  public function deeplink()
  {
      return $this->belongsTo('App\Deeplink');
  }

  public function webuser()
  {
      return $this->belongsTo('App\Webuser');
  }
}
