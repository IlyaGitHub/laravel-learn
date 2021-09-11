<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'User',
            ],
            [
                'name' => 'Writer',
            ]
        ];

        Role::upsert($roles, ['name']);
    }
}
