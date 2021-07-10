<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model{
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'user_type',
        'password',
        'updated_at',
        'created_at'
    ];
    protected $hidden = ['password'];
}
?>
