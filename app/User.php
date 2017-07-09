<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $rules = [
      'name' => 'required',
      'password' => 'required|min:6'
    ];

    protected $fillable = [
        'name', 'password',
    ];

    protected $hidden = [
        'password',
    ];
}
