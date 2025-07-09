<div class="sidebar p-3">
    <h4 class="text-center mb-4">Ra Ha Til Academy</h4>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('students*') ? 'active' : '' }}" href="{{ route('students.index') }}">
                <i class="fas fa-user-graduate me-2"></i> Students
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('teachers*') ? 'active' : '' }}" href="{{ route('teachers.index') }}">
                <i class="fas fa-chalkboard-teacher me-2"></i> Teachers
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('courses*') ? 'active' : '' }}" href="{{ route('courses.index') }}">
                <i class="fas fa-book me-2"></i> Courses
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('batches*') ? 'active' : '' }}" href="{{ route('batches.index') }}">
                <i class="fas fa-users me-2"></i> Batches
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('enrollments*') ? 'active' : '' }}" href="{{ route('enrollments.index') }}">
                <i class="fas fa-clipboard-list me-2"></i> Enrollments
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('payments*') ? 'active' : '' }}" href="{{ route('payments.index') }}">
                <i class="fas fa-money-bill-wave me-2"></i> Payments
            </a>
        </li>
    </ul>
</div>