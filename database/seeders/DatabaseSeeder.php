<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('membership_types')->insert([[
            'type' => 'Regular',
            'created_at' => now(),
            'updated_at' => now()
        ], [
            'type' => 'Associate',
            'created_at' => now(),
            'updated_at' => now()
        ]]);
    }
}
