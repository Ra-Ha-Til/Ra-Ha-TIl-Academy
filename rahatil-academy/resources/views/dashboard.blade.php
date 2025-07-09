@extends('layouts.app')

@section('title', 'Dashboard')


@push('styles')
<style>
    .card.clickable {
        cursor: pointer;
        border-radius: 15px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    .card.clickable:hover {
        transform: scale(1.03);
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.15);
    }
    .card-body i {
        opacity: 0.7;
    }
    .card-title {
        font-size: 1.2rem;
        font-weight: 600;
    }
    .display-4 {
        font-weight: bold;
    }
    .bg-student {
        background: linear-gradient(45deg, #1e88e5, #42a5f5);
        color: white;
    }
    .bg-teacher {
        background: linear-gradient(45deg, #43a047, #66bb6a);
        color: white;
    }
    .bg-course {
        background: linear-gradient(45deg, #8e24aa, #ab47bc);
        color: white;
    }
    .bg-enrollment {
        background: linear-gradient(45deg, #f4511e, #ff7043);
        color: white;
    }
    .bg-payment {
        background: linear-gradient(45deg, #fdd835, #ffee58);
        color: #333;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Dashboard Overview</h2>
    
    <div class="row">
        <!-- Students Card -->
        <div class="col-md-4 mb-4">
            <div class="card clickable bg-student" onclick="window.location.href='{{ route('students.index') }}'">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Students</h5>
                    <h1 class="display-4">{{ $totalStudents }}</h1>
                    <i class="fas fa-user-graduate fa-3x mb-3"></i>
                </div>
            </div>
        </div>
        
        <!-- Teachers Card -->
        <div class="col-md-4 mb-4">
            <div class="card clickable bg-teacher" onclick="window.location.href='{{ route('teachers.index') }}'">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Teachers</h5>
                    <h1 class="display-4">{{ $totalTeachers }}</h1>
                    <i class="fas fa-chalkboard-teacher fa-3x mb-3"></i>
                </div>
            </div>
        </div>
        
        <!-- Courses Card -->
        <div class="col-md-4 mb-4">
            <div class="card clickable bg-course" onclick="window.location.href='{{ route('courses.index') }}'">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Courses</h5>
                    <h1 class="display-4">{{ $totalCourses }}</h1>
                    <i class="fas fa-book fa-3x mb-3"></i>
                </div>
            </div>
        </div>
        
        <!-- Enrollments Card -->
        <div class="col-md-6 mb-4">
            <div class="card clickable bg-enrollment" onclick="window.location.href='{{ route('enrollments.index') }}'">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Enrollments</h5>
                    <h1 class="display-4">{{ $totalEnrollments }}</h1>
                    <i class="fas fa-clipboard-list fa-3x mb-3"></i>
                </div>
            </div>
        </div>
        
        <!-- Payments Card -->
        <div class="col-md-6 mb-4">
            <div class="card clickable bg-payment" onclick="window.location.href='{{ route('payments.index') }}'">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Payments</h5>
                    <h1 class="display-4">${{ number_format($totalPayments, 2) }}</h1>
                    <i class="fas fa-money-bill-wave fa-3x mb-3"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
