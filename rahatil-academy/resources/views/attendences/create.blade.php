@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Attendance Record</h2>
    
    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="student_id" class="form-label">Student</label>
            <select class="form-select" id="student_id" name="student_id" required>
                <option value="">Select Student</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="">Select Status</option>
                <option value="present">Present</option>
                <option value="absent">Absent</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection