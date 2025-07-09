@extends('layouts.app')

@section('title', 'Edit Batch')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Batch</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('batches.update', $batch->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Batch Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $batch->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="course_id" class="form-label">Course</label>
                            <select class="form-control" id="course_id" name="course_id" required>
                                @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ $course->id == $batch->course_id ? 'selected' : '' }}>{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $batch->start_date->format('Y-m-d') }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('batches.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection