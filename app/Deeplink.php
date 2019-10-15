<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Deeplink extends Model
{
  protected $appends = ['url'];

  public function getUrlAttribute()
  {
      return App::make('url')->to("/dl/{$this->hash}");
  }

  public function clicks()
  {
      return $this->hasMany('App\Click');
  }

  public function user()
  {
      return $this->belongsTo('App\User');
  }
}
