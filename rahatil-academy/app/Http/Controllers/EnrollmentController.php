<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Batch;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::with(['batch', 'student'])->get();
        return view('enrollments.index', compact('enrollments'));
    }

    public function create()
    {
        $batches = Batch::all();
        $students = Student::all();
        return view('enrollments.create', compact('batches', 'students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'enroll_no' => 'required|unique:enrollments',
            'batch_id' => 'required|exists:batches,id',
            'student_id' => 'required|exists:students,id',
            'join_date' => 'required|date',
            'fee' => 'required|numeric',
        ]);

        Enrollment::create($request->all());

        return redirect()->route('enrollments.index')
            ->with('success', 'Enrollment created successfully.');
    }

    public function show(Enrollment $enrollment)
    {
        return view('enrollments.show', compact('enrollment'));
    }

    public function edit(Enrollment $enrollment)
    {
        $batches = Batch::all();
        $students = Student::all();
        return view('enrollments.edit', compact('enrollment', 'batches', 'students'));
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $request->validate([
            'enroll_no' => 'required|unique:enrollments,enroll_no,'.$enrollment->id,
            'batch_id' => 'required|exists:batches,id',
            'student_id' => 'required|exists:students,id',
            'join_date' => 'required|date',
            'fee' => 'required|numeric',
        ]);

        $enrollment->update($request->all());

        return redirect()->route('enrollments.index')
            ->with('success', 'Enrollment updated successfully');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        return redirect()->route('enrollments.index')
            ->with('success', 'Enrollment deleted successfully');
    }
}