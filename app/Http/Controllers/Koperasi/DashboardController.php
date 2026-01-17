<?php

namespace App\Http\Controllers\Koperasi;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'koperasi') {
        abort(403);
    }
        return view('koperasi.dashboard.index'); // pastikan file view ini juga ada
    }
    
}
