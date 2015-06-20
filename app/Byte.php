<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Byte extends Model {

	protected $fillable = [

        'name',
        'story',
        'rating',
        'type',
        'privacy',
        'time_perspective',
        'year',
        'month',
        'day',
        'hour',
        'minute',
        'second',
        'byte_date',
        'accuracy',
        'image_id',
        'place_id',
        'lifeline_id',
        'user_id'
    ];

    protected $dates = ['byte_date'];

    public function user(){

        return $this->belongsTo('\App\User');
    }

}
