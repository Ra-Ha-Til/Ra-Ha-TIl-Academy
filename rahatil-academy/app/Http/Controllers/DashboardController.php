<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalStudents' => Student::count(),
            'totalTeachers' => Teacher::count(),
            'totalCourses' => Course::count(),
            'totalEnrollments' => Enrollment::count(),
            'totalPayments' => Payment::count(),
        ];

        return view('dashboard', $data);
    }
}