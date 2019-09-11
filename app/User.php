<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'confirmation_token', 'is_confirmed'
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
    public function isConfirmed(){
        //return !! переводит чилсло на булеан
        return !! $this->is_confirmed;
    }
    public function getEmailConfirmationToken()
    {
        $token = Str::random();
        $this->update([
            'confirmation_token' => $token
        ]);
        return $token;
    }

    public function confirm()
    {
        $this->update([
            'is_confirmed' => 1,
            'confirmation_token' => null
        ]);
    }
}
