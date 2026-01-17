<?php

namespace App\Http\Controllers\Santri;
use App\Http\Controllers\Controller;
use App\Models\Keuangan;
use App\Models\Santri;
use App\Models\Bendahara;
use Carbon\Carbon;
use illuminate\Support\Str;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function transaksiSantri(Request $request)
{
    $user = auth()->user();

    // Cek apakah user punya relasi santri
    if (!$user->santri) {
        abort(403, 'Santri tidak ditemukan untuk user ini.');
    }

    $santri = $user->santri;
    $santriId = $santri->id;

    $bulan = $request->input('bulan');
    $bulan_terpilih = $bulan ?? now()->format('Y-m'); // default: bulan ini

    $keuangans = Keuangan::where('santri_id', $santriId)->get();

    // Hitung bulan yang sudah dibayar
    $bayarBulanans = $keuangans
        ->where('jenis_transaksi', 'bayar_bulanan')
        ->map(fn ($item) => \Carbon\Carbon::parse($item->tanggal)->format('Y-m'))
        ->unique()
        ->values();

    // Hitung saldo
    $total_simpan = $keuangans->where('jenis_transaksi', 'simpanan')->sum('jumlah');
    $total_ambil = $keuangans->where('jenis_transaksi', 'penarikan')->sum('jumlah');
    $total_spp = $keuangans->where('jenis_transaksi', 'bayar_bulanan')
                           ->where('manual_override', false)
                           ->sum('jumlah');

    $saldo = $total_simpan - $total_ambil - $total_spp;

    return view('santri.history', compact(
        'santri',
        'keuangans',
        'bayarBulanans',
        'bulan_terpilih',
        'saldo'
    ));
}


       
   public function index(Request $request)
{
    $santri = auth()->user()->santri;
    if (!$santri) {
        abort(403, 'User tidak memiliki akses sebagai santri.');
    }

    $bulan = $request->input('bulan');
    $bulan_terpilih = $bulan ?? now()->format('Y-m');

    $transaksis = Keuangan::where('santri_id', $santri->id)
        ->when($bulan, function ($query) use ($bulan) {
            $tanggal = Carbon::parse($bulan);
            $query->whereMonth('tanggal', $tanggal->month)
                  ->whereYear('tanggal', $tanggal->year);
        })
        ->latest()
        ->get();

    $bayarBulanans = $transaksis
        ->where('jenis_transaksi', 'bayar_bulanan')
        ->map(fn ($item) => Carbon::parse($item->tanggal)->format('Y-m'))
        ->unique()
        ->values();
$saldo = [];
$riwayat = $transaksis->where('santri_id', $santri->id);
    $total_simpan = $transaksis->where('jenis_transaksi', 'simpanan')->sum('jumlah');
    $total_ambil = $transaksis->where('jenis_transaksi', 'penarikan')->sum('jumlah');
    $total_spp = $transaksis->where('jenis_transaksi', 'bayar_bulanan')
                            ->where('manual_override', false)
                            ->sum('jumlah');

    $saldo = $total_simpan - $total_ambil - $total_spp;

    return view('santri.history.index', compact(
        'santri',
        'transaksis',
        'bayarBulanans',
        'bulan_terpilih',
        'saldo'
    ));
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
