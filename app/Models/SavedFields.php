<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedFields extends Model
{
    use HasFactory;

    protected $table = 'saved_fields';
    protected $primaryKey = 'id';
    protected $fillable =
    [
        "id",
        "nik",
        "entry",
        "fields_id",
        "status_id",
    ];
    protected $hidden =
    [
        "created_at",
        "updated_at",
    ];

    public function Users()
    {
        return $this->belongsTo(Users::class, "nik", "nik");
    }

    public function Fields()
    {
        return $this->belongsTo(Fields::class, "fields_id", "id");
    }
}
