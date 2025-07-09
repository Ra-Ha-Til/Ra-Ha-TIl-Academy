@extends('layouts.app')

@section('title', 'Payments')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-md-12">
            <h2>Payments</h2>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12 d-flex justify-content-between">
            <a href="{{ route('payments.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Payment
            </a>
            <button onclick="printPayments()" class="btn btn-success">
                <i class="fas fa-print"></i> Print Payments
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="paymentsTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Enrollment</th>
                                    <th>Student</th>
                                    <th>Paid Date</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($payments as $payment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $payment->enrollment->enroll_no }}</td>
                                    <td>{{ $payment->enrollment->student->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($payment->paid_date)->format('d M Y') }}</td>
                                    <td>${{ number_format($payment->amount, 2) }}</td>
                                    <td>
                                        <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this payment?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">No payments found.</td>
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

<!-- Print Styles and Script -->
<style>
    @media print {
        body * {
            visibility: hidden;
        }
        #printSection, #printSection * {
            visibility: visible;
        }
        #printSection {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
        .no-print {
            display: none !important;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    }
</style>

<script>
    function printPayments() {
        // Create a print section
        let printContents = `
            <div id="printSection">
                <h2 style="text-align: center; margin-bottom: 20px;">Ra Ha Til Academy - Payments Report</h2>
                <p style="text-align: right; margin-bottom: 10px;"><strong>Generated on:</strong> ${new Date().toLocaleString()}</p>
                <table border="1" style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Enrollment No</th>
                            <th>Student</th>
                            <th>Paid Date</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${generateTableRows()}
                    </tbody>
                </table>
                <div style="margin-top: 30px; text-align: right;">
                    <p><strong>Total Payments:</strong> $${calculateTotal()}</p>
                    <p><strong>Total Records:</strong> {{ $payments->count() }}</p>
                </div>
            </div>
        `;

        // Open print window
        let printWindow = window.open('', '', 'width=800,height=600');
        printWindow.document.write(`
            <html>
                <head>
                    <title>Payments Report</title>
                    <style>
                        body { font-family: Arial, sans-serif; }
                        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                        th { background-color: #f2f2f2; }
                        .text-right { text-align: right; }
                        .total-row { font-weight: bold; }
                    </style>
                </head>
                <body>
                    ${printContents}
                    <script>
                        window.onload = function() {
                            window.print();
                            setTimeout(function() {
                                window.close();
                            }, 100);
                        };
                    <\/script>
                </body>
            </html>
        `);
        printWindow.document.close();
    }

    function generateTableRows() {
        let rows = '';
        let payments = @json($payments);
        
        payments.forEach((payment, index) => {
            rows += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${payment.enrollment.enroll_no}</td>
                    <td>${payment.enrollment.student.name}</td>
                    <td>${new Date(payment.paid_date).toLocaleDateString('en-US', { day: '2-digit', month: 'short', year: 'numeric' })}</td>
                    <td>$${parseFloat(payment.amount).toFixed(2)}</td>
                </tr>
            `;
        });
        
        return rows;
    }

    function calculateTotal() {
        let payments = @json($payments);
        let total = 0;
        
        payments.forEach(payment => {
            total += parseFloat(payment.amount);
        });
        
        return total.toFixed(2);
    }
</script>
@endsection