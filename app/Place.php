<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Place extends Model
{
    use PresentableTrait;

    protected $presenter = 'App\Lifecanvas\Presenters\PlacePresenter';

    protected $guarded = ['id'];

    public function user() {

        return $this->belongsTo('App\User');

    }

    public function bytes() {

        return $this->hasMany('App\Byte');

    }

    public function country() {

        return $this->belongsTo('App\Country');

    }

    public function zone() {

        return $this->belongsTo('App\Zone');

    }
}
