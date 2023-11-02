<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSubmittedField extends Model
{
    use HasFactory;

    protected $table = 'form_submitted_field';
    protected $primaryKey = ['form_submissions_id', 'field_submissions_id'];
    public $incrementing = false;
    protected $fillable =
    [
        "form_submissions_id",
        "field_submissions_id",
    ];
    protected $hidden =
    [
        "created_at",
        "updated_at",
    ];

    public function FieldSubmissions()
    {
        return $this->belongsTo(FieldSubmissions::class, "field_submissions_id", "id");
    }

    public function FormSubmissions()
    {
        return $this->belongsTo(FormSubmissions::class, "form_submissions_id", "id");
    }
}
