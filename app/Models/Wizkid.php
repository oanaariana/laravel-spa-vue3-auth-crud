<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wizkid extends Model
{
    use HasFactory;

//     - Name
//     - Role
//     Options: boss, developer, designer, intern.
//     - Email
//     - Picture
//     - Phone number

    protected $fillable = ['name', 'role', 'email', 'picture', 'phone'];
}
