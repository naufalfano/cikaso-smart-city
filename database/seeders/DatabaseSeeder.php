<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $seeders = [
        'local' => [
            AdminsSeeder::class,
            StatusType::class,
            FieldTypeSeeder::class,
            FieldsSeeder::class,
            FormsSeeder::class,
            FormHasFieldSeeder::class,
        ],
        'production' => [
            AdminsSeeder::class,
            StatusType::class,
            FieldTypeSeeder::class,
            FieldsSeeder::class,
            FormsSeeder::class,
            FormHasFieldSeeder::class,
        ],
    ];

    public function run(): void
    {
        if (!array_key_exists(app()->environment(), $this->seeders)) {
            return;
        }
        $this->call($this->seeders[app()->environment()]);
    }
}
