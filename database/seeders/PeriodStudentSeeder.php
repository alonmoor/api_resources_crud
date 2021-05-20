<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Period;
use App\Models\PeriodStudent;

class PeriodStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = Student::paginate(5);
        $periods = Period::paginate(5);

        foreach ($students as $student) {
            foreach ($periods as $period) {
                PeriodStudent::firstOrCreate([
                    'student_id' => $student->id,
                    'period_id' => $period->id,
                ]);
            }
        }
    }
}