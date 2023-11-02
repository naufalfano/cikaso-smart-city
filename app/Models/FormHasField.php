<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormHasField extends Model
{
    use HasFactory;

    protected $table = 'form_has_field';
    protected $primaryKey = ['form_id', 'field_id'];
    public $incrementing = false;
    protected $fillable =
    [
        "form_id",
        "field_id",
    ];
    protected $hidden =
    [
        "created_at",
        "updated_at",
    ];

    public function Forms()
    {
        return $this->belongsTo(Forms::class, "forms_id", "id");
    }

    public function Fields()
    {
        return $this->belongsTo(Fields::class, "fields_id", "id");
    }
}
