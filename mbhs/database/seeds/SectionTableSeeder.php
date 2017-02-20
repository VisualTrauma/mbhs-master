<?php

use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    public function run() {
        $sectionsData = [
            [
                ['order' => 'Section 1', 'name' => 'Rizal', 'room' => '101', 'grade_level' => 7, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 2', 'name' => 'Mabini', 'room' => '102', 'grade_level' => 7, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 3', 'name' => 'Aguinaldo', 'room' => '103', 'grade_level' => 7, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 4', 'name' => 'Lapu-lapu', 'room' => '104', 'grade_level' => 7, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 5', 'name' => 'Jacinto', 'room' => '105', 'grade_level' => 7, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 6', 'name' => 'Bonifacio', 'room' => '106', 'grade_level' => 7, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 7', 'name' => 'Aquino', 'room' => '107', 'grade_level' => 7, 'added_by' => 'Esmeraldo de Guzman']
            ],
            [
                ['order' => 'Section 1', 'name' => 'Mercury', 'room' => '201', 'grade_level' => 8, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 2', 'name' => 'Venus', 'room' => '202', 'grade_level' => 8, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 3', 'name' => 'Earth', 'room' => '203', 'grade_level' => 8, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 4', 'name' => 'Mars', 'room' => '204', 'grade_level' => 8, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 5', 'name' => 'Jupiter', 'room' => '205', 'grade_level' => 8, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 6', 'name' => 'Saturn', 'room' => '206', 'grade_level' => 8, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 7', 'name' => 'Uranus', 'room' => '207', 'grade_level' => 8, 'added_by' => 'Esmeraldo de Guzman']
            ],
            [
                ['order' => 'Section 1', 'name' => 'Narra', 'room' => '101', 'grade_level' => 9, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 2', 'name' => 'Mahogany', 'room' => '102', 'grade_level' => 9, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 3', 'name' => 'Ipil', 'room' => '103', 'grade_level' => 9, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 4', 'name' => 'Akasya', 'room' => '104', 'grade_level' => 9, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 5', 'name' => 'Kamagong', 'room' => '105', 'grade_level' => 9, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 6', 'name' => 'Apitong', 'room' => '106', 'grade_level' => 9, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 7', 'name' => 'Molave', 'room' => '107', 'grade_level' => 9, 'added_by' => 'Esmeraldo de Guzman']
            ],
            [
                ['order' => 'Section 1', 'name' => 'Love', 'room' => '201', 'grade_level' => 10, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 2', 'name' => 'Patience', 'room' => '202', 'grade_level' => 10, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 3', 'name' => 'Hope', 'room' => '203', 'grade_level' => 10, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 4', 'name' => 'Faith', 'room' => '204', 'grade_level' => 10, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 5', 'name' => 'Joy', 'room' => '205', 'grade_level' => 10, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 6', 'name' => 'Perseverance', 'room' => '206', 'grade_level' => 10, 'added_by' => 'Esmeraldo de Guzman'],
                ['order' => 'Section 7', 'name' => 'Courage', 'room' => '207', 'grade_level' => 10, 'added_by' => 'Esmeraldo de Guzman']
            ]
        ];

        foreach ($sectionsData as $sections) {
            foreach ($sections as $section) {
                App\Section::create($section);
            }
        }
    }
}
