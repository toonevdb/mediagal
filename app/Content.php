<?php

namespace MediaGal;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'name', 'description',
    ];

    /**
     * Get all derived content.
     */
    public function derived()
    {
        return $this->hasMany(DerivedContent::class);
    }

    /**
     * Get the owner of the content.
     */
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
