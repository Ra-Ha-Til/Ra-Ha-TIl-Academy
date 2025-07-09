<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('enrollment')->get();
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $enrollments = Enrollment::all();
        return view('payments.create', compact('enrollments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'enrollment_id' => 'required|exists:enrollments,id',
            'paid_date' => 'required|date',
            'amount' => 'required|numeric',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')
            ->with('success', 'Payment created successfully.');
    }

    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        $enrollments = Enrollment::all();
        return view('payments.edit', compact('payment', 'enrollments'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'enrollment_id' => 'required|exists:enrollments,id',
            'paid_date' => 'required|date',
            'amount' => 'required|numeric',
        ]);

        $payment->update($request->all());

        return redirect()->route('payments.index')
            ->with('success', 'Payment updated successfully');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('payments.index')
            ->with('success', 'Payment deleted successfully');
    }
}