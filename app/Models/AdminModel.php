<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AdminModel extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin_models'; 

    protected $fillable = [

        'username','email', 'phone', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
