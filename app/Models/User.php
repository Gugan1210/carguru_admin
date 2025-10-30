<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
   protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'status'
    ];
    protected $casts = [
    'id' => 'integer',
    'name' => 'string',
    'email' => 'string',
    'email_verified_at' => 'datetime',
    'password' => 'string',
    'phone' => 'string',
    'status' => 'boolean',
    'remember_token' => 'string',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];

    protected $hidden = [
        'password',
        'remember_token',
    ];



}
