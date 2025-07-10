@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-6">
            <h2>Attendance Records</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('attendances.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Attendance
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Student</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->id }}</td>
                    <td>{{ $attendance->student->name }}</td>
                    <td>{{ $attendance->date->format('M d, Y') }}</td>
                    <td>
                        <span class="badge bg-{{ $attendance->status == 'present' ? 'success' : 'danger' }}">
                            {{ ucfirst($attendance->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('attendances.show', $attendance->id) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $attendances->links() }}
    </div>
</div>
@endsection