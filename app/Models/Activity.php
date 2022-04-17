<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    /**
     * The events that belong to the activity.
     */
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
