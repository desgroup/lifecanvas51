<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{

    protected $guarded = ['id'];

    /**
     * Get the bytes associated with the Person
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bytes() {

        return $this->belongsToMany('App\Byte')->latest('byte_date');

    }

}
