<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Byte extends Model {

	protected $fillable = [

        'name',
        'story',
        'rating',
        'type',
        'privacy',
        'time_perspective',
        'byte_date',
        'accuracy',
        'zone_id',
        'image_id',
        'place_id',
        'lifeline_id',
        'user_id'
    ];

    /*
     * Turns a timestamp into a Carbon instance
     */
    protected $dates = ['byte_date'];

    /*
     * Scopes
     */
    public function scopePast($query) {

        $query->where('byte_date', '<=', Carbon::now('UTC'));

    }

    /*
     * Relationships
     */
    public function user() {

        return $this->belongsTo('App\User');
    }

    public function place() {

        return $this->belongsTo('App\Place');
    }

    public function zone() {

        return $this->belongsTo('App\Zone');
    }

}
