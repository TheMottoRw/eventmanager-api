<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $table="evenements";
    protected $fillable = [
        'business_id',
        'event_name',
        'event_type',
        'brief_description',
        'full_description',
        'images',
        'event_kikoff',
        'event_close',
        'reservation_allowed',
        'created_at',
    ];
}
