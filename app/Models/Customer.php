<?php

namespace App\Models;

use App\Traits\UuidManager;
use App\Traits\ModelEventThrower;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;
    use UuidManager;
    use ModelEventThrower;

    protected $guard = 'customer';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'uuid', 'first_name', 'last_name', 'email', 'contact_no', 'password'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
