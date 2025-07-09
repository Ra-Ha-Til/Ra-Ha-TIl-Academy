<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Batch;
use App\Models\Enrollment;
use App\Models\Payment;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create 10 teachers
        $teachers = Teacher::factory(10)->create();

        // For each teacher, create 2 courses
        $teachers->each(function ($teacher) {
            $courses = Course::factory(2)->create(['teacher_id' => $teacher->id]);

            // For each course, create 3 batches
            $courses->each(function ($course) {
                $batches = Batch::factory(3)->create(['course_id' => $course->id]);

                // For each batch, create 5 students and enroll them
                $batches->each(function ($batch) {
                    $students = Student::factory(5)->create();

                    $students->each(function ($student) use ($batch) {
                        $enrollment = Enrollment::factory()->create([
                            'batch_id' => $batch->id,
                            'student_id' => $student->id,
                        ]);

                        // Create 2 payments for each enrollment
                        Payment::factory(2)->create(['enrollment_id' => $enrollment->id]);
                    });
                });
            });
        });
    }
}