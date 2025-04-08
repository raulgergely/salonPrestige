<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model; // Use default Eloquent Model for MySQL

class User extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, Notifiable;

    protected $connection = 'mysql'; // Use MySQL connection
    protected $table = 'users'; // Ensure the table name is set for MySQL

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'employee_role'
    ];

    public const ROLES = ['admin', 'user', 'receptionist', 'employee'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function setRoleAttribute($value)
    {
        if (!in_array($value, self::ROLES)) {
            throw new \InvalidArgumentException("Invalid role: $value");
        }
        $this->attributes['role'] = $value;
    }

    public $timestamps = true; // Enable automatic `created_at` and `updated_at` for MySQL
}
