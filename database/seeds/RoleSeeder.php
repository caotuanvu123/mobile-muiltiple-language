<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => "admin",
                'display_name' => 'Project Owner',
                'description' => 'User is the owner of a given project'
            ],
            [
                'name' => "customer",
                'display_name' => 'User customer',
                'description' => 'User is allowed order'
            ]
        ]);
    }
}
