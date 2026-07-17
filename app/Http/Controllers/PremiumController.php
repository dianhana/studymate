<?php

namespace App\Http\Controllers;

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
}