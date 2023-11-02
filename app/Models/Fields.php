<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fields extends Model
{
    use HasFactory;

    protected $table = 'fields';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable =
    [
        "id",
        "title",
        "description",
        "field_type_id",
        "admin_id",
    ];
    protected $hidden =
    [
        "created_at",
        "updated_at",
    ];

    public function FieldSubmissions()
    {
        return $this->hasMany(FieldSubmissions::class, "fields_id", "id");
    }

    public function FormHasField()
    {
        return $this->hasMany(FormHasField::class, "fields_id", "id");
    }

    public function FieldTypes()
    {
        return $this->belongsTo(FieldTypes::class, "field_type_id", "id");
    }

    public function Admin()
    {
        return $this->belongsTo(Admin::class, "admin_id", "id");
    }
}
