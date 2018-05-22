<?php

namespace MediaGal\Core;

use Illuminate\Database\Eloquent\Model;

class DerivedContent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'plugin',
    ];

    /**
     * Get the parent content object.
     *
     * @return void
     */
    public function parent()
    {
        return $this->belongsTo(Content::class);
    }
}
