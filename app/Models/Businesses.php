<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Businesses extends Model
{
    use HasFactory;
    protected $table="businesses";
    protected $fillable = [
        'name',
        'business_type',
        'tin',
        'contact_number',
        'address',
        'status',
        'password',
        'created_at',
    ];
}