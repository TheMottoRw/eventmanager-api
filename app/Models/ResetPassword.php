<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
    use HasFactory;
    protected $table="reset_code";
    protected $fillable = [
        'reference_id',
        'reference_type',
        'code',
        'status',
        'expire_date',
        'updated_at',
        'created_at',
    ];
}
