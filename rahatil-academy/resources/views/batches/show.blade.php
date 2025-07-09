@extends('layouts.app')

@section('title', 'Batch Details')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Batch Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Name: {{ $batch->name }}</h5>
                            <p>Course: {{ $batch->course->name }}</p>
                            <p>Start Date: {{ $batch->start_date->format('d M Y') }}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('batches.edit', $batch->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('batches.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection