<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'about',
        'slug',
        'place',
        'year',
        'edition',
        'start_date',
        'end_date',
        'job_call_start_date',
        'job_call_and_date',
        'announce_schedule_start_date',
        'announce_schedule_end_date',
        'certificates_issuance_start_date',
        'certificates_issuance_end_date',
        'subscription_issuance_start_date',
        'subscription_issuance_end_date',
        'link_schedule',
        'link_certificates',
        'link_photos',
        'link_registrations',
        'user_id'
    ];
}
