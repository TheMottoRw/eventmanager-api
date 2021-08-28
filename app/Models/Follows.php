<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follows extends Model
{
    use HasFactory;
    protected $table="follows";

    protected $fillable = [
        'business_id',
        'user_id',
        'updated_at',
        'created_at',
    ];
}
