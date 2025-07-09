@extends('layouts.app')

@section('title', 'Add New Payment')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add New Payment</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('payments.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="enrollment_id" class="form-label">Enrollment</label>
                            <select class="form-control" id="enrollment_id" name="enrollment_id" required>
                                <option value="">Select Enrollment</option>
                                @foreach($enrollments as $enrollment)
                                <option value="{{ $enrollment->id }}">
                                    {{ $enrollment->enroll_no }} - {{ $enrollment->student->name }} ({{ $enrollment->batch->name }})
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="paid_date" class="form-label">Paid Date</label>
                            <input type="date" class="form-control" id="paid_date" name="paid_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('payments.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection