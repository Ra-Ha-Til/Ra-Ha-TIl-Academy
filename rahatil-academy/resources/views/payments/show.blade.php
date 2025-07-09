@extends('layouts.app')

@section('title', 'Payment Details')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Payment Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Enrollment: {{ $payment->enrollment->enroll_no }}</h5>
                            <p>Student: {{ $payment->enrollment->student->name }}</p>
                            <p>Batch: {{ $payment->enrollment->batch->name }}</p>
                            <p>Paid Date: {{ \Carbon\Carbon::parse($payment->paid_date)->format('d M Y') }}</p>
                            <p>Amount: ${{ number_format($payment->amount, 2) }}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('payments.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
