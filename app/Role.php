<?php

namespace MediaGal;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the users attached to this role.
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->as('user_roles')->withTimestamps();
    }
}
