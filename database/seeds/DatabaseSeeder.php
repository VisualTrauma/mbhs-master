<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(StudentTableSeeder::class);
        $this->call(SectionTableSeeder::class);
        $this->call(TeacherTableSeeder::class);
        $this->call(SubjectTableSeeder::class);
        $this->call(TveSubjectTableSeeder::class);
    }
}
