<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\TeacherStudent;
class TeacherStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = Student::paginate(5);
        $teachers = Teacher::paginate(5);

        foreach ($students as $student) {
            foreach ($teachers as $teacher) {
                TeacherStudent::firstOrCreate([
                    'student_id' => $student->id,
                    'teacher_id' => $teacher->id,
                ]);
            }
        }
    }
}
