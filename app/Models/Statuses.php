<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statuses extends Model
{
    use HasFactory;

    protected $table = 'statuses';
    protected $primaryKey = 'id';
    protected $fillable =
    [
        "id",
        "name",
    ];
    protected $hidden =
    [
        "created_at",
        "updated_at",
    ];

    public function FormSubmissions()
    {
        return $this->hasMany(FormSubmissions::class, "status_id", "id");
    }

    public function FieldSubmissions()
    {
        return $this->hasMany(FieldSubmissions::class, "status_id", "id");
    }
}
