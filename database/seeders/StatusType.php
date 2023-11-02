<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusType extends Seeder
{
    public function run()
    {
        $json = file_get_contents(database_path('seeders/json/statuses.json'));
        $statuses = json_decode($json, true);
        if ($this->checkIfSeeded($statuses)) {
            return;
        }

        $payload = [];
        foreach ($statuses as $status) {
            if (DB::table('statuses')->where('id', $status['id'])->count() > 0)
                continue;

            $payload[] = [
                'id' => $status['id'],
                'status' => $status['status'],
                'description' => $status['description'],
            ];
        }
        DB::table('statuses')->insert($payload);
    }

    public function checkIfSeeded(array $id): bool
    {
        $seeded = true;

        for ($i = 0; $i < count($id); $i++) {
            $table_rows = DB::table('statuses')->where('id', $id[$i]['id'])->count();
            if ($table_rows === 0) {
                $seeded = false;
                break;
            }
        }

        return $seeded;
    }
}
