<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSubmissions extends Model
{
    use HasFactory;

    protected $table = 'form_submissions';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable =
    [
        "id",
        "nik",
        "forms_id",
        "status_id",
    ];
    protected $hidden =
    [
        "created_at",
        "updated_at",
    ];

    public function FormSubmittedField()
    {
        return $this->hasMany(FormSubmittedField::class, "form_submissions_id", "id");
    }

    public function Users()
    {
        return $this->belongsTo(Users::class, "nik", "nik");
    }

    public function Statuses()
    {
        return $this->belongsTo(Statuses::class, "status_id", "id");
    }

    public function Forms()
    {
        return $this->belongsTo(Forms::class, "forms_id", "id");
    }
}
