<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{
    use HasFactory;

    protected $table = 'forms';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable =
    [
        "id",
        "title",
        "image",
        "admin_id",
    ];
    protected $hidden =
    [
        "created_at",
        "updated_at",
    ];

    public function FormSubmissions()
    {
        return $this->hasMany(FormSubmissions::class, "forms_id", "id");
    }

    public function FormHasField()
    {
        return $this->hasMany(FormHasField::class, "forms_id", "id");
    }

    public function Admin()
    {
        return $this->belongsTo(Admin::class, "admin_id", "id");
    }
}
