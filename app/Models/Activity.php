<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'description',
        'level',
        'duration',
        'date',
        'observations',
        'status',
        'speaker_id',
        'space_id',
        'user_id',
    ];

    /**
     * The events that belong to the activity.
     */
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    /**
     * Get the speaker that owns the activity.
     */
    public function speaker()
    {
        return $this->belongsTo(Speaker::class);
    }

    /**
     * Get the space that owns the activity.
     */
    public function space()
    {
        return $this->belongsTo(Space::class);
    }
}
