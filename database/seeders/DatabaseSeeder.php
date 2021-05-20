<?php

namespace Database\Seeders;

use App\Models\StudentTeacher;
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
        //$this->call(StudentSeeder::class);
      //  $this->call(AuthorSeeder::class);


      $this->call([
        StudentSeeder::class,
        TeacherSeeder::class,
        PeriodSeeder::class,
        TeacherStudentSeeder::class,
        PeriodStudentSeeder::class,
    ]);


    }
}
