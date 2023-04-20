<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Space extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'reference',
        'address_id',
        'user_id'
    ];

    /**
     * Get the activities for the space.
     */
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
