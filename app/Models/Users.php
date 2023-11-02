<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

class Users extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable, Authorizable;

    protected $table = 'users';
    protected $primaryKey = 'nik';
    protected $keyType = 'string';
    protected $fillable =
    [
        "nik",
    ];
    protected $hidden =
    [
        "created_at",
        "updated_at",
    ];

    public function SavedFields()
    {
        return $this->hasMany(SavedFields::class, "nik", "nik");
    }

    public function FieldSubmissions()
    {
        return $this->hasMany(FieldSubmissions::class, "nik", "nik");
    }

    public function FormSubmissions()
    {
        return $this->hasMany(FormSubmissions::class, "nik", "nik");
    }
}
