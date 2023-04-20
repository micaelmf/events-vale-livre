<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'map',
        'number',
        'street',
        'district',
        'city',
        'user_id'
    ];

    /**
     * Get the spaces for the event.
     */
    public function spaces()
    {
        return $this->hasMany(Space::class);
    }

    /**
     * Get the events for the event.
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
