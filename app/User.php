<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Relationships
     */

    /**
     * A user has many bytes relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bytes()
    {
        return $this->hasMany('App\Byte');
    }

    /**
     * A user has many people relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function people()
    {
        return $this->hasMany('App\People');
    }

    /**
     * A user has many places relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function places()
    {
        return $this->hasMany('App\Place');
    }

    /**
     * A user has many images relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function lines() {

        return $this->hasMany('App\Line');

    }

    public function follow() {

        return $this->belongsToMany(self::class, 'follow',
            'follower_id', 'followed_id')->withTimestamps();

    }
}
