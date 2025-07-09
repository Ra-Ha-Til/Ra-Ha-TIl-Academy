@extends('layouts.app')

@section('title', 'Edit Payment')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Payment</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('payments.update', $payment->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="enrollment_id" class="form-label">Enrollment</label>
                            <select class="form-control" id="enrollment_id" name="enrollment_id" required>
                                @foreach($enrollments as $enrollment)
                                <option value="{{ $enrollment->id }}" 
                                    {{ $enrollment->id == $payment->enrollment_id ? 'selected' : '' }}>
                                    {{ $enrollment->enroll_no }} - {{ $enrollment->student->name }} ({{ $enrollment->batch->name }})
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="paid_date" class="form-label">Paid Date</label>
                            <input 
                                type="date" 
                                class="form-control" 
                                id="paid_date" 
                                name="paid_date" 
                                value="{{ \Carbon\Carbon::parse($payment->paid_date)->format('Y-m-d') }}" 
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input 
                                type="number" 
                                step="0.01" 
                                class="form-control" 
                                id="amount" 
                                name="amount" 
                                value="{{ $payment->amount }}" 
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('payments.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
