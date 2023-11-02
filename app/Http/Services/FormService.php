<?php

namespace App\Http\Services;

use App\Http\FileUpload\FileUpload;
use App\Models\Fields;
use App\Models\FieldSubmissions;
use App\Models\FieldTypes;
use App\Models\FormHasField;
use App\Models\Forms;
use App\Models\FormSubmissions;
use App\Models\FormSubmittedField;
use App\Models\SavedFields;
use Ramsey\Uuid\Uuid;

class FormService
{
    public function __construct()
    {
    }

    public function getForm(string $id): object
    {
        return Forms::where('id', $id)->firstOrFail();
    }

    public function getForms(): object
    {
        return Forms::all();
    }

    public function getFormFields(string $id): array
    {
        $fields = FormHasField::where('forms_id', $id)->get();
        $fields_data = [];
        foreach ($fields as $field) {
            $field = Fields::where('id', $field->fields_id)->first();
            $fields_data[] = [
                'id' => $field->id,
                'title' => $field->title,
                'description' => $field->description,
                'type' => FieldTypes::find($field->field_type_id)->type,
            ];
        }

        return $fields_data;
    }

    public function submitForm(string $nik, string $form_id, array $fields): bool
    {
        $submission_form_id = Uuid::uuid4()->toString();
        $created_form = FormSubmissions::create([
            "id" => $submission_form_id,
            "nik" => $nik,
            "forms_id" => $form_id,
            "status_id" => 1,
        ]);

        foreach ($fields as $field) {
            $submission_field_id = Uuid::uuid4()->toString();

            if ($field['type'] == 'file' && !is_string($field['value'])) {
                $file = FileUpload::create($field['value'], 'forms', $submission_field_id, $field['value']->getClientOriginalName());
                $file->upload();
                $field['value'] = $file->getUrl();
            }

            FieldSubmissions::create([
                "id" => $submission_field_id,
                "nik" => $nik,
                "entry" => $field['value'],
                "fields_id" => $field['id'],
                "status_id" => 102,
            ]);

            $this->saveField($field['id'], $nik, $field['value']);

            FormSubmittedField::create([
                "form_submissions_id" => $submission_form_id,
                "field_submissions_id" => $submission_field_id,
            ]);
        }

        return true;
    }

    public function getSavedField(string $field_id, string $nik): string
    {
        $savedField = SavedFields::where('fields_id', $field_id)->where('nik', $nik)->first();

        if (!$savedField)
            return '';

        return $savedField->entry;
    }

    public function saveField(string $field_id, string $nik, string $value): bool
    {
        // check if it's already exist
        $savedField = SavedFields::where('fields_id', $field_id)->where('nik', $nik)->first();

        if (!$savedField) {
            SavedFields::create([
                'id' => Uuid::uuid4()->toString(),
                'fields_id' => $field_id,
                'nik' => $nik,
                'entry' => $value,
            ]);

            return true;
        }

        if ($savedField->entry != $value) {
            $savedField->update([
                'entry' => $value,
            ]);

            return true;
        }

        return false;
    }

    public function getMyForms(string $nik): object
    {
        $forms = FormSubmissions::where('nik', $nik)->get();

        return $forms;
    }

    public function getMyForm(string $id): object
    {
        $forms = FormSubmissions::where('id', $id)->first();

        return $forms;
    }
}
