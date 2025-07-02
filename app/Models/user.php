<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property string $email
 * @property string $password
 * @property string $phone_number
 * @property \Carbon\Carbon $created_at
 *
 * Validation rules:
 *   first_name: required, string, max:100
 *   last_name: required, string, max:100
 *   address: required, string, max:200
 *   email: required, email, max:100
 *   phone_number: nullable, string, max:20
 *   password: required, string, max:100
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'email',
        'password',
        'phone_number',
        'created_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
} 