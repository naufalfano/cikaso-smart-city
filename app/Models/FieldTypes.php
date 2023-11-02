<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldTypes extends Model
{
    use HasFactory;

    protected $table = 'field_types';
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

    public function Fields()
    {
        return $this->hasMany(Fields::class, "field_type_id", "id");
    }
}
