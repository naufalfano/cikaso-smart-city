<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormHasFieldSeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents(database_path('seeders/json/form_has_field.json'));
        $fields = json_decode($json, true);
        if ($this->checkIfSeeded($fields)) {
            return;
        }

        $payload = [];
        foreach ($fields as $field) {
            if (DB::table('form_has_field')->where('forms_id', $field['forms_id'])->where('fields_id', $field['fields_id'])->count() > 0)
                continue;

            $payload[] = [
                "forms_id" => $field['forms_id'],
                "fields_id" => $field['fields_id'],
            ];
        }
        DB::table('form_has_field')->insert($payload);
    }

    public function checkIfSeeded(array $id): bool
    {
        $seeded = true;

        for ($i = 0; $i < count($id); $i++) {
            $table_rows = DB::table('form_has_field')->where('forms_id', $id[$i]['forms_id'])->where('fields_id', $id[$i]['fields_id'])->count();
            if ($table_rows === 0) {
                $seeded = false;
                break;
            }
        }

        return $seeded;
    }
}
