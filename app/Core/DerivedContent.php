<?php

namespace MediaGal\Core;

use Illuminate\Database\Eloquent\Model;

class DerivedContent extends Model
{
    /**
     * Name of the database table.
     *
     * @var string
     */
    protected $table = 'derived_content';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filename', 'name', 'plugin',
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
