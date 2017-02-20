<?php

use Illuminate\Database\Seeder;

class TeacherTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Teacher::class, 50)->create();
    }
}
