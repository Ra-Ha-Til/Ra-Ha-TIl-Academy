@extends('layouts.app')

@section('title', 'Edit Enrollment')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Enrollment</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('enrollments.update', $enrollment->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="enroll_no" class="form-label">Enrollment Number</label>
                            <input type="text" class="form-control" id="enroll_no" name="enroll_no" value="{{ $enrollment->enroll_no }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="batch_id" class="form-label">Batch</label>
                            <select class="form-control" id="batch_id" name="batch_id" required>
                                @foreach($batches as $batch)
                                <option value="{{ $batch->id }}" {{ $batch->id == $enrollment->batch_id ? 'selected' : '' }}>
                                    {{ $batch->name }} ({{ $batch->course->name }})
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="student_id" class="form-label">Student</label>
                            <select class="form-control" id="student_id" name="student_id" required>
                                @foreach($students as $student)
                                <option value="{{ $student->id }}" {{ $student->id == $enrollment->student_id ? 'selected' : '' }}>
                                    {{ $student->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="join_date" class="form-label">Join Date</label>
                            <input type="date" class="form-control" id="join_date" name="join_date" value="{{ $enrollment->join_date->format('Y-m-d') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="fee" class="form-label">Fee</label>
                            <input type="number" step="0.01" class="form-control" id="fee" name="fee" value="{{ $enrollment->fee }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('enrollments.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection