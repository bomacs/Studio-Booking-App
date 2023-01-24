<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;

class AdminBookingPaymentController extends Controller
{
    /**
     * Show Booking Payment
     */
    public function show($id)
    {
        return view('admin.payments.show',[
            'payment' => Payment::findOrFail($id),
        ]);
    }

    /**
     * Show Edit Form
     */
    public function edit($id)
    {
        return view('admin.payments.edit', [
            'payment' => Payment::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'payment_type' => ['required', 'string'],
            'payment_status' => ['required', 'string'],
        ]);

        if ($request->downpayment)
        {
            $request->validate(['downpayment' => ['required', 'integer', 'min:0',]]);
        };

        if ($request->payment == 'gcash')
        {
           $request->validate(['ref_num' => ['required', 'unique:payments']]);
        };  

        $payment = Payment::findOrFail($id);
        $payment->update([
            'payment_type' => $request->payment_type,
            'downpayment' => $request->downpayment,
            'ref_num' => $request->ref_num,
            'payment_status' => $request->payment_status,
        ]);

        return redirect()->back()->with("message", "Payment was updated successfully.");
        
    }

    /**
     * Delete payment record
     */
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        $payment->booking->delete();

        return redirect()->back()->with("message", "Payment was deleted successfully!");
    }

}
