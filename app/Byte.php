<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Byte extends Model {

    use PresentableTrait;

    protected $presenter = 'App\Lifecanvas\Presenters\BytePresenter';

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

    /**
     * Get the people associated with the byte
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function people() {

        return $this->belongsToMany('App\People')->withTimestamps();

    }

    public function getPeopleListAttribute() {

        return $this->people()->lists('id')->toArray();

    }

    /**
     * Get the lines associated with the byte
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function lines() {

        return $this->belongsToMany('App\Line')->withTimestamps();

    }

    public function getLineListAttribute() {

        return $this->lines()->lists('id')->toArray();

    }

    public function image() {

        return $this->belongsTo('App\Image');
    }

    public function place() {

        return $this->belongsTo('App\Place');
    }

    public function zone() {

        return $this->belongsTo('App\Zone');
    }

}
