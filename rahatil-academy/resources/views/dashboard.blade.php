@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Dashboard Overview</h2>
    
    <div class="row">
        <!-- Students Card -->
        <div class="col-md-4 mb-4">
            <div class="card clickable" onclick="window.location.href='{{ route('students.index') }}'">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Students</h5>
                    <h1 class="display-4">{{ $totalStudents }}</h1>
                    <i class="fas fa-user-graduate fa-3x mb-3"></i>
                </div>
            </div>
        </div>
        
        <!-- Teachers Card -->
        <div class="col-md-4 mb-4">
            <div class="card clickable" onclick="window.location.href='{{ route('teachers.index') }}'">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Teachers</h5>
                    <h1 class="display-4">{{ $totalTeachers }}</h1>
                    <i class="fas fa-chalkboard-teacher fa-3x mb-3"></i>
                </div>
            </div>
        </div>
        
        <!-- Courses Card -->
        <div class="col-md-4 mb-4">
            <div class="card clickable" onclick="window.location.href='{{ route('courses.index') }}'">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Courses</h5>
                    <h1 class="display-4">{{ $totalCourses }}</h1>
                    <i class="fas fa-book fa-3x mb-3"></i>
                </div>
            </div>
        </div>
        
        <!-- Enrollments Card -->
        <div class="col-md-6 mb-4">
            <div class="card clickable" onclick="window.location.href='{{ route('enrollments.index') }}'">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Enrollments</h5>
                    <h1 class="display-4">{{ $totalEnrollments }}</h1>
                    <i class="fas fa-clipboard-list fa-3x mb-3"></i>
                </div>
            </div>
        </div>
        
        <!-- Payments Card -->
        <div class="col-md-6 mb-4">
            <div class="card clickable" onclick="window.location.href='{{ route('payments.index') }}'">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Payments</h5>
                    <h1 class="display-4">{{ $totalPayments }}</h1>
                    <i class="fas fa-money-bill-wave fa-3x mb-3"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection