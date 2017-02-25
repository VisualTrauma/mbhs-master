<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Student::class, 4000)->create();
    }
}
