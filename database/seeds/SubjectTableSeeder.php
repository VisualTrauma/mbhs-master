<?php

use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder 
{
    public function run()
    {
        $subjectsData = [
            [
                ['code' => 'ICF', 'description' => 'Internet and Computer Fundamentals', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['code' => 'FIL', 'description' => 'Filipino', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['code' => 'ENG', 'description' => 'English', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['code' => 'MATH', 'description' => 'Mathematics', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['code' => 'SCI', 'description' => 'Science', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['code' => 'MAPEH', 'description' => 'Music, Arts, Physical Education, and Health', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['code' => 'ESP', 'description' => 'Edukasyong Pagpapakatao', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['code' => 'AP', 'description' => 'Araling Panlipunan', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['code' => 'TVE', 'description' => 'Technical Drawing', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['code' => 'BM I', 'description' => 'Business Math I', 'added_by' => 'Esmeraldo de Guzman Jr'],
            ]
        ];

        foreach ($subjectsData as $subjects) {
            foreach ($subjects as $subject) {
                App\Subject::create($subject);
            }
        }
    }
}
