@extends('layouts.app')

@section('title', 'Enrollments')

@section('styles')
<style>
    /* Colorful Theme Styles */
    :root {
        --primary: #3498db;       /* Blue */
        --secondary: #2ecc71;     /* Green */
        --accent: #e74c3c;        /* Red */
        --highlight: #f39c12;     /* Orange */
        --light: #ecf0f1;         /* Light Gray */
        --dark: #2c3e50;          /* Dark Blue */
    }
    
    body {
        background-color: #f5f7fa;
    }
    
    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    
    .card-header {
        background: linear-gradient(135deg, var(--primary), var(--dark));
        color: white;
        padding: 15px 20px;
    }
    
    .btn-primary {
        background-color: var(--primary);
        border-color: var(--primary);
    }
    
    .btn-success {
        background-color: var(--secondary);
        border-color: var(--secondary);
    }
    
    .btn-danger {
        background-color: var(--accent);
        border-color: var(--accent);
    }
    
    .btn-warning {
        background-color: var(--highlight);
        border-color: var(--highlight);
    }
    
    .table thead th {
        background-color: var(--dark);
        color: white;
        border: none;
    }
    
    .table tbody tr:nth-child(even) {
        background-color: rgba(52, 152, 219, 0.05);
    }
    
    .table tbody tr:hover {
        background-color: rgba(46, 204, 113, 0.1);
    }
    
    .badge {
        padding: 5px 10px;
        border-radius: 20px;
        font-weight: 500;
    }
    
    .badge-success {
        background-color: rgba(46, 204, 113, 0.2);
        color: var(--secondary);
    }
    
    .badge-warning {
        background-color: rgba(243, 156, 18, 0.2);
        color: var(--highlight);
    }
    
    .action-btns .btn {
        margin-right: 5px;
        border-radius: 50px;
        min-width: 35px;
    }
    
    /* Status colors */
    .status-paid {
        color: var(--secondary);
        font-weight: 600;
    }
    
    .status-pending {
        color: var(--highlight);
        font-weight: 600;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-md-12">
            <h2>Enrollments</h2>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <a href="{{ route('enrollments.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Enrollment
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Enroll No</th>
                                    <th>Batch</th>
                                    <th>Student</th>
                                    <th>Join Date</th>
                                    <th>Fee</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($enrollments as $enrollment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $enrollment->enroll_no }}</td>
                                    <td>{{ $enrollment->batch->name }}</td>
                                    <td>{{ $enrollment->student->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($enrollment->join_date)->format('d M Y') }}</td>
                                    <td>${{ number_format($enrollment->fee, 2) }}</td>
                                    <td>
                                        <a href="{{ route('enrollments.show', $enrollment->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this enrollment?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No enrollments found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
