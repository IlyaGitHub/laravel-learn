<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserWriterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'Writer')->firstOrFail();

        User::create([
            'name' => 'Writer',
            'email' => 'writer@site.com',
            'password' => Hash::make('admin-admin'),
            'role_id' => $role->id
        ]);
    }
}
