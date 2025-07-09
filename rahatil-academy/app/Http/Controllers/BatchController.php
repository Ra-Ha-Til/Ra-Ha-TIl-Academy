<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Course;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function index()
    {
        $batches = Batch::with('course')->get();
        return view('batches.index', compact('batches'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('batches.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'course_id' => 'required|exists:courses,id',
            'start_date' => 'required|date',
        ]);

        Batch::create($request->all());

        return redirect()->route('batches.index')
            ->with('success', 'Batch created successfully.');
    }

    public function show(Batch $batch)
    {
        return view('batches.show', compact('batch'));
    }

    public function edit(Batch $batch)
    {
        $courses = Course::all();
        return view('batches.edit', compact('batch', 'courses'));
    }

    public function update(Request $request, Batch $batch)
    {
        $request->validate([
            'name' => 'required',
            'course_id' => 'required|exists:courses,id',
            'start_date' => 'required|date',
        ]);

        $batch->update($request->all());

        return redirect()->route('batches.index')
            ->with('success', 'Batch updated successfully');
    }

    public function destroy(Batch $batch)
    {
        $batch->delete();

        return redirect()->route('batches.index')
            ->with('success', 'Batch deleted successfully');
    }
}