<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Santri;
use Illuminate\Http\Request;
use app\Http\Controllers\Auth;
use app\Http\Controllers\Admin\KeuanganController;

class SantriController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'santri') {
        abort(403);
    }
        return view('santri.dashboard.index'); // pastikan file view ini juga ada
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'nis' => 'required|numeric|unique:santris',
        'alamat' => 'required|string',
        'tanggal_lahir' => 'required|date',
        'kamar' => 'required|string',
        'bendahara_id' => 'required|exists:bendaharas,id',
    ]);

    $email = $validated['nis'].'@santri.local';

    $user = User::updateOrCreate(
        ['email' => $email],
        [
            'name' => $validated['nama'],
            'password' => Hash::make($validated['nis']),
            'role' => 'santri',
        ]
    );

    // Gabungkan user_id ke data santri
    $dataSantri = array_merge($validated, ['user_id' => $user->id]);

    Santri::create($dataSantri);

    return redirect()->route('santri')->with('success', 'Santri berhasil ditambahkan.');
}
}
