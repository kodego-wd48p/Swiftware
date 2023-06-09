<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomUser extends Model
{
    use HasFactory;
    protected $table = 'custom_users';
    protected $fillable = ['username', 'email', 'password'];
}
