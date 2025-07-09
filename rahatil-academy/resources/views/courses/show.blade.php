@extends('layouts.app')

@section('title', 'Course Details')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Course Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Name: {{ $course->name }}</h5>
                            <p>Syllabus: {{ $course->syllabus }}</p>
                            <p>Duration: {{ $course->duration }}</p>
                            <p>Teacher: {{ $course->teacher->name }}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('courses.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection