@extends('layouts.app')

@section('title', 'Teacher Details')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Teacher Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Name: {{ $teacher->name }}</h5>
                            <p>Address: {{ $teacher->address }}</p>
                            <p>Mobile: {{ $teacher->mobile }}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection