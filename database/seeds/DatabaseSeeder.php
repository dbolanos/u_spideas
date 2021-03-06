<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ItemsRequestSeeder::class);
        $this->call(RolesPermissionUsersSeeder::class);
        $this->call(RequestStatusSeeder::class);
    }
}
