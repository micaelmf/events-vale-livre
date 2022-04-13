<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Speaker extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'job',
        'bio',
        'photo',
        'link_github',
        'link_linkedin',
        'link_medium',
        'link_instagram',
        'link_twitter',
        'link_facebook',
        'link_youtube',
        'user_id'
    ];
}
