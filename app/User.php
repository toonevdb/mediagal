<?php

namespace MediaGal;

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
        'name', 'email', 'password', 'superadmin',
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
     * Get all content owned by the user.
     */
    public function content()
    {
        return $this->hasMany(Content::class);
    }

    /**
     * Get the roles attached to this user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->as('user_roles')->withTimestamps();
    }
}
