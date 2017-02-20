<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

// User Model Factory
$factory->define(App\User::class, function (Faker\Generator $faker) {

    static $password;
    $designation = ['principal', 'teacher-1', 'teacher-2'];
    $accessLevel = ['admin', 'default', 'normal', 'registrar'];

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'designation' => $faker->randomElement($designation),
        'access_level' => $faker->randomElement($accessLevel),
        'contact_number' => $faker->numerify('09#########'),
        'username' => $faker->unique()->userName,
        'password' => bcrypt('password')
    ];
});

// Student Model Factory
$factory->define(App\Student::class, function (Faker\Generator $faker) {

    $status = array('Enrolled', 'Retained', 'Passed');
    $onOff = array('on', 'off');
    $gender = array('Male', 'Female');
    $gradeLevel = array(7, 8, 9, 10);

    return [
        'lrn' => $faker->numerify('############'),
        'registration_code' => $faker->numberBetween(0, 100001),
        'first_name' => $faker->firstName,
        'middle_name' => $faker->lastName,
        'last_name' => $faker->lastName,
        'gender' => $faker->randomElement($gender),
        'birthdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'status' => $faker->randomElement($status),
        'grade_level' => $faker->numberBetween(7, 10),
        'form137' => $faker->randomElement($onOff),
        'birth_certificate' => $faker->randomElement($onOff),
        'id_picture' => $faker->randomElement($onOff),
        'guardian_name' => $faker->name,
        'address' => $faker->address,
        'mobile_number' => $faker->numerify('09#########'),
        'tel_number' => $faker->numerify('#######'),
        'general_average' => $faker->numberBetween(50, 100),
        'last_school_attended' => $faker->company,
        'year_graduated' => $faker->numberBetween(1986, 2016)
    ];
});

// Teacher Model Factory
$factory->define(App\Teacher::class, function (Faker\Generator $faker) {

    $teachingArea = ['First Floor', 'Second Floor', 'Third Floor', 'Fourth Floor'];

    return [
        'page_access_id' => $faker->numerify('##'),
        'password' => bcrypt('password'),
        'first_name' =>  $faker->firstName,
        'middle_name' => $faker->lastName,
        'last_name' => $faker->lastName,
        'teaching_area' => $faker->randomElement($teachingArea),
        'contact_number' =>  $faker->numerify('09#########')
    ];
});

// Teacher Model Factory
$factory->define(App\PageAccess::class, function (Faker\Generator $faker) {

    $page = ['Admin', 'Registrar', 'Default', 'Grade 7 Enrollment', 'Grade 8 Enrollment', 'Grade 9 Enrollment', 'Grade 10 Enrollment'];

    return [
        'page_name' => $faker->randomElement($page)
    ];
});
