<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

class Admins extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable, Authorizable;

    protected $table = 'admins';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable =
    [
        "id",
        "name",
        "email",
        "password",
    ];
    protected $hidden =
    [
        "password",
        "created_at",
        "updated_at",
    ];

    public function Forms()
    {
        return $this->hasMany(Forms::class, "admin_id", "id");
    }

    public function Fields()
    {
        return $this->hasMany(Fields::class, "admin_id", "id");
    }
}
