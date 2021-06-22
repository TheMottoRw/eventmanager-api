<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table="reservation";
    protected $fillable = [
        'business_id',
        'event_id',
        'user_id',
        'status',
        'updated_at',
        'created_at',

    ];
}
