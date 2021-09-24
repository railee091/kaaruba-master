<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

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
