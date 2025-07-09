@extends('layouts.app')

@section('title', 'Edit Course')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Course</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('courses.update', $course->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $course->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="syllabus" class="form-label">Syllabus</label>
                            <textarea class="form-control" id="syllabus" name="syllabus" rows="3" required>{{ $course->syllabus }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="text" class="form-control" id="duration" name="duration" value="{{ $course->duration }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="teacher_id" class="form-label">Teacher</label>
                            <select class="form-control" id="teacher_id" name="teacher_id" required>
                                @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}" {{ $teacher->id == $course->teacher_id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection