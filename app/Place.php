<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $guarded = ['id'];

    public function user() {

        return $this->belongsTo('App\User');

    }

    public function country() {

        return $this->belongsTo('App\Country');

    }

    public function zone() {

        return $this->belongsTo('App\Zone');

    }
}
