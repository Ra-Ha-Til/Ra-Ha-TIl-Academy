@extends('layouts.app')

@section('title', 'Courses')

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
            <h2>Courses</h2>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <a href="{{ route('courses.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Course
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
                                    <th>Name</th>
                                    <th>Syllabus</th>
                                    <th>Duration</th>
                                    <th>Teacher</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($courses as $course)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ Str::limit($course->syllabus, 50) }}</td>
                                    <td>{{ $course->duration }}</td>
                                    <td>{{ $course->teacher->name }}</td>
                                    <td>
                                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this course?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">No courses found.</td>
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