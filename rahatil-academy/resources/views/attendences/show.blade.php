@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Attendance Details</h2>
    
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">ID:</div>
                <div class="col-md-8">{{ $attendance->id }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Student:</div>
                <div class="col-md-8">{{ $attendance->student->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Date:</div>
                <div class="col-md-8">{{ $attendance->date->format('M d, Y') }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Status:</div>
                <div class="col-md-8">
                    <span class="badge bg-{{ $attendance->status == 'present' ? 'success' : 'danger' }}">
                        {{ ucfirst($attendance->status) }}
                    </span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Created At:</div>
                <div class="col-md-8">{{ $attendance->created_at->format('M d, Y H:i') }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Updated At:</div>
                <div class="col-md-8">{{ $attendance->updated_at->format('M d, Y H:i') }}</div>
            </div>
        </div>
    </div>
    
    <div class="mt-3">
        <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Edit
        </a>
        <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                <i class="fas fa-trash"></i> Delete
            </button>
        </form>
        <a href="{{ route('attendances.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>
</div>
@endsection