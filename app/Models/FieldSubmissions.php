<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldSubmissions extends Model
{
    use HasFactory;

    protected $table = 'field_submissions';
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

    public function Fields()
    {
        return $this->belongsTo(Fields::class, "fields_id", "id");
    }

    public function Statuses()
    {
        return $this->belongsTo(Statuses::class, "status_id", "id");
    }

    public function FormSubmissions()
    {
        return $this->belongsTo(FormSubmissions::class, "nik", "nik");
    }
}
