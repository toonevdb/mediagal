<?php

namespace MediaGal\Core;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    /**
     * Name of the database table.
     *
     * @var string
     */
    protected $table = 'content';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'filename', 'name', 'description',
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

    /**
     * Storage key attibute.
     *
     * @return string
     */
    public function getStorageKeyAttribute()
    {
        return $this->attributes['id'].'/'.$this->attributes['filename'];
    }
}
