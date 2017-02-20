<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $defaultUser = factory(App\User::class)->make(['username' => 'root', 'password' => bcrypt('password'), 'access_level' => 'superadmin']);
        $defaultUser->save();
        factory(App\User::class, 10)->create();
    }
}
