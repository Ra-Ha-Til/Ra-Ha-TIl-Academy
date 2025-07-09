@extends('layouts.app')

@section('title', 'Student Details')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Student Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Name: {{ $student->name }}</h5>
                            <p>Address: {{ $student->address }}</p>
                            <p>Mobile: {{ $student->mobile }}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection