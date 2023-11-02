<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormsSeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents(database_path('seeders/json/forms.json'));
        $forms = json_decode($json, true);
        if ($this->checkIfSeeded($forms)) {
            return;
        }

        $payload = [];
        foreach ($forms as $form) {
            if (DB::table('forms')->where('id', $form['id'])->count() > 0)
                continue;

            $payload[] = [
                'id' => $form['id'],
                'title' => $form['title'],
                'image' => $form['image'],
                'admin_id' => $form['admin_id'],
            ];
        }
        DB::table('forms')->insert($payload);
    }

    public function checkIfSeeded(array $id): bool
    {
        $seeded = true;

        for ($i = 0; $i < count($id); $i++) {
            $table_rows = DB::table('forms')->where('id', $id[$i]['id'])->count();
            if ($table_rows === 0) {
                $seeded = false;
                break;
            }
        }

        return $seeded;
    }
}
