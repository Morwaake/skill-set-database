<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'role','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function skills(){
        return $this->hasOne('App\Skill');
    }

    public function profile()
    {
        return $this->hasOne('App\Adept');
    }

    public function stakeholder()
    {
        return $this->hasOne('App\Stakeholder');
    }

    public function image()
    {
        return $this->hasMany('App\Image');
    }

    public function pending_course()
    {
        return $this->hasMany('App\Pending_Course');
    }

    public function pending_skill()
    {
        return $this->hasOne('App\Pending_Course');
    }
}
