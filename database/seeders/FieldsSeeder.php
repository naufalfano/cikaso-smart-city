<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldsSeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents(database_path('seeders/json/fields.json'));
        $fields = json_decode($json, true);
        if ($this->checkIfSeeded($fields)) {
            return;
        }

        $payload = [];
        foreach ($fields as $field) {
            if (DB::table('fields')->where('id', $field['id'])->count() > 0)
                continue;

            $payload[] = [
                "id" => $field['id'],
                "title" => $field['title'],
                "description" => $field['description'],
                "field_type_id" => $field['field_type_id'],
                "admin_id" => $field['admin_id'],
            ];
        }
        DB::table('fields')->insert($payload);
    }

    public function checkIfSeeded(array $id): bool
    {
        $seeded = true;

        for ($i = 0; $i < count($id); $i++) {
            $table_rows = DB::table('fields')->where('id', $id[$i]['id'])->count();
            if ($table_rows === 0) {
                $seeded = false;
                break;
            }
        }

        return $seeded;
    }
}
