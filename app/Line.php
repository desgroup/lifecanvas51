<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{

    protected $guarded = ['id'];

    /**
     * Get the bytes associated with the Lifeline
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bytes() {

        return $this->belongsToMany('App\Byte')->latest('byte_date');

    }

}
