@extends('layouts.app')

@section('title', 'Enrollment Details')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Enrollment Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Enrollment Number: {{ $enrollment->enroll_no }}</h5>
                            <p>Batch: {{ $enrollment->batch->name }} ({{ $enrollment->batch->course->name }})</p>
                            <p>Student: {{ $enrollment->student->name }}</p>
                            <p>Join Date: {{ $enrollment->join_date->format('d M Y') }}</p>
                            <p>Fee: ${{ number_format($enrollment->fee, 2) }}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('enrollments.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection