<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password', 'role',
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
     * Returns user role
     *
     * @return enumerated role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Verify the user role (required by CheckRole middleware).
     *
     * @return bool
     */
    public function hasRole($roles)
    {
       if (in_array($this->getRole(), $roles)) {
            return true;
        }
        else {
            return false;
        }
    }
}
