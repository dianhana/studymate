<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment');
    }

    public function process(Request $request)
    {
        $request->validate([
            'payment_method' => 'required'
        ]);

        $user = auth()->user();

        $user->membership = 'premium';
        $user->membership_expired_at = now()->addMonth();
        $user->save();

        return redirect()
            ->route('premium')
            ->with('success', 'Pembayaran berhasil! Selamat datang di StudyMate Premium 🎉');
    }
}