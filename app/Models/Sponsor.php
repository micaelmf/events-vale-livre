<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sponsor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'about',
        'image',
        'type',
        'user_id'
    ];

    /**
     * The events that belong to the sponsor.
     */
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
