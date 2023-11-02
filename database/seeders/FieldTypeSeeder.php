<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldTypeSeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents(database_path('seeders/json/field_type.json'));
        $fields = json_decode($json, true);
        if ($this->checkIfSeeded($fields)) {
            return;
        }

        $payload = [];
        foreach ($fields as $field) {
            if (DB::table('field_types')->where('id', $field['id'])->count() > 0)
                continue;

            $payload[] = [
                "id" => $field['id'],
                "type" => $field['type'],
            ];
        }
        DB::table('field_types')->insert($payload);
    }

    public function checkIfSeeded(array $id): bool
    {
        $seeded = true;

        for ($i = 0; $i < count($id); $i++) {
            $table_rows = DB::table('field_types')->where('id', $id[$i]['id'])->count();
            if ($table_rows === 0) {
                $seeded = false;
                break;
            }
        }

        return $seeded;
    }
}
