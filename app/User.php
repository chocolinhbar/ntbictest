<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','hinh_anh', 'username', 'email', 'password', 'level','email_token', 'verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tintuc() {
        return $this->hasMany('App\TinTuc','users_id','id');
    }

    public function sukien() {
        return $this->hasMany('App\SuKien','users_id','id');
    }

    public function comment() {
        return $this->hasMany('App\comment','users_id','id');
    }
    //send mail
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
    public function verified()
    {
       $this->verified = 1;
       $this->email_token = null;
       $this->save();
    }
}
