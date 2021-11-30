<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'name' => 'Diori Time Log',
            'backend'=>'laravel',
            'start_date'=>Carbon::parse('2021-11-04'),
            'customer_id'=>1
        ]);
        DB::table('projects')->insert([
            'name' => 'Gave Universet',
            'backend'=>'laravel',
            'start_date'=>Carbon::parse('2021-09-24'),
            'customer_id'=>2
        ]);
    }
}
