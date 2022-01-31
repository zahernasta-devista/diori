<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'name' => 'Messi',
            'email' => 'messi@gmail.com'
        ]);
        DB::table('customers')->insert([
            'name' => 'Katherine',
            'email' => 'Katherine@yahoo.com'
        ]);
    }
}
