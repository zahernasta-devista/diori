<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Meizan Admin',
            'email' => 'test@admin.ro',
            'password' => Hash::make('password'),
            'position' => "Admin",
            "organization_id" => 1,
            "first_time_login" => 0
        ]);

        $role = Role::create(['name' => 'admin']);

        $user->assignRole([$role->id]);

        $userEmployee = User::create([
            'name' => 'Mazen emp',
            'email' => 'test@employee.ro',
            'password' => Hash::make('password'),
            'position' => "Intern",
            "organization_id" => 1,
            "first_time_login" => 0
        ]);

        $roleEmployee = Role::create(['name' => 'employee']);

        $userEmployee->assignRole([$roleEmployee->id]);

    }
}
