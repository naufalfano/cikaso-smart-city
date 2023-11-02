<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{
    public function run()
    {
        if ($this->checkIfSeeded()) {
            return;
        }

        $payload = [];

        $payload[] = [
            "id" => "e9d4e038-40cf-11ee-8b2b-0250e351439c",
            "name" => "Admin",
            "password" => Hash::make('12345678')
        ];

        DB::table('admins')->insert($payload);
    }

    public function checkIfSeeded(): bool
    {
        $seeded = true;

        $table_rows = DB::table('admins')->where('id', 'e9d4e038-40cf-11ee-8b2b-0250e351439c')->count();
        if ($table_rows === 0) {
            $seeded = false;
        }

        return $seeded;
    }
}
