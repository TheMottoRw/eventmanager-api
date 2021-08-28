<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Savedforlater extends Model
{
    use HasFactory;
    protected $table="savedforlater";

    protected $fillable = [
        'event_id',
        'user_id',
        'updated_at',
        'created_at',
    ];
}
