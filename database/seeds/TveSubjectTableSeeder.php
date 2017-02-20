<?php

use Illuminate\Database\Seeder;

class TveSubjectTableSeeder extends Seeder
{
    public function run()
    {
        $tveSubjectsData = [
            [
                ['description' => 'Technical Drawing I', 'grade_level' => 'Grade 7', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['description' => 'Dressmaking I', 'grade_level' => 'Grade 8', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['description' => 'Welding Services I', 'grade_level' => 'Grade 8', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['description' => 'Carpentry I', 'grade_level' => 'Grade 8', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['description' => 'Cookery I', 'grade_level' => 'Grade 8', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['description' => 'Computer Hardware Servicing I', 'grade_level' => 'Grade 8', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['description' => 'Consumer Electronic Servicing I', 'grade_level' => 'Grade 8', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['description' => 'Beauty Care Servicing I', 'grade_level' => 'Grade 8', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['description' => 'Technical Drawing II', 'grade_level' => 'Grade 9', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['description' => 'Dressmaking II', 'grade_level' => 'Grade 9', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['description' => 'Welding Services II', 'grade_level' => 'Grade 9', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['description' => 'Carpentry II', 'grade_level' => 'Grade 9', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['description' => 'Cookery II', 'grade_level' => 'Grade 9', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['description' => 'Computer Hardware Servicing II', 'grade_level' => 'Grade 9', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['description' => 'Consumer Electronic Servicing II', 'grade_level' => 'Grade 9', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['description' => 'Beauty Care Servicing II', 'grade_level' => 'Grade 9', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['description' => 'Dressmaking III', 'grade_level' => 'Grade 10', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['description' => 'Welding Services III', 'grade_level' => 'Grade 10', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['description' => 'Carpentry III', 'grade_level' => 'Grade 10', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['description' => 'Cookery III', 'grade_level' => 'Grade 10', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['description' => 'Computer Hardware Servicing III', 'grade_level' => 'Grade 10', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['description' => 'Consumer Electronic Servicing III', 'grade_level' => 'Grade 10', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['description' => 'Beauty Care Servicing III', 'grade_level' => 'Grade 10', 'added_by' => 'Esmeraldo de Guzman Jr'],
                ['description' => 'Entrepreneurship', 'grade_level' => 'Grade 10', 'added_by' => 'Esmeraldo de Guzman Jr'],
            ]
        ];

        foreach ($tveSubjectsData as $tveSubjects) {
            foreach ($tveSubjects as $tve) {
                App\TveSubject::create($tve);
            }
        }
    }
}
