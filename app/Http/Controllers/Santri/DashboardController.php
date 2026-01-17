<?php

namespace App\Http\Controllers\Santri;
use App\Http\Controllers\Controller;
use App\Models\Keuangan;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
       
    public function index()
{
    $santri = auth()->user()->santri;
    $transaksis = Keuangan::where('santri_id', $santri->id)->latest()->get();

    return view('santri.dashboard.index', compact('santri', 'transaksis'));
}

    // public function index()
    // {
    //     $santriId = auth()->user()->santri->id;

    //     if (auth()->user()->role !== 'santri') {
    //     abort(403);
    // }
    //     return view('santri.dashboard.index'); // pastikan file view ini juga ada
    // }
    
}
