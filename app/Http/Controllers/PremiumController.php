<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PremiumController extends Controller
{
    public function index()
    {
        return view('premium');
    }

    public function checkout()
    {
        return view('payment');
    }

    public function pay(Request $request)
    {
        $user = Auth::user();

        $user->update([
            'membership' => 'premium',
            'membership_expired_at' => now()->addYear()
        ]);

        return redirect()
            ->route('premium')
            ->with('success', 'Pembayaran berhasil. Akun sekarang Premium.');
    }
}