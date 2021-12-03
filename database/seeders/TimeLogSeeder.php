<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('timelogs')->insert([
            'time' => '4',
            'date' => Carbon::parse('2021-11-22'),
            'comment'=>'testing for diori',
            'user_id'=>2,
            'project_id'=>1
        ]);
        DB::table('timelogs')->insert([
            'time' => '4',
            'date' => Carbon::parse('2021-11-22'),
            'comment'=>'testing for Gave',
            'user_id'=>2,
            'project_id'=>2
        ]);
    }
}
