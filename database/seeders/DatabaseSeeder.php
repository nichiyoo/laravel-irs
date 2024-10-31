<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use App\Models\StudentCourse;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
        ]);

        Course::factory()->count(50)->create();
        $students = Student::factory()->count(32)->create();

        foreach ($students as $student) {
            $temp = $student->sks;
            for ($i = 0; $i < 4; $i++) {
                $course = Course::inRandomOrder()->first();
                if ($temp < $course->sks) break;
                StudentCourse::create([
                    'student_id' => $student->id,
                    'course_id' => $course->id,
                ]);
            }
        }
    }
}
