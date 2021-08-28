<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $table="reviews";

    protected $fillable = [
        'event_id',
        'user_id',
        'review',
        'rate',
        'images',
        'updated_at',
        'created_at',

    ];
}
