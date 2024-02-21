<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->insert([
            'name' => 'Diori',
            'address' => 'Bld. Cutare Nr.20',
            'phone_number' => '0767555444',
        ]);
    }
}
