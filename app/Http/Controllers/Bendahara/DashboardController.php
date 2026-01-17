<?php

namespace App\Http\Controllers\Bendahara;
use App\Http\Controllers\Controller;
use App\Models\Santri;
use App\Models\KoperasiTransaction;
use App\Http\Controllers\Bendahara\KeuanganController;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
         
    public function index()
    {
        if (auth()->user()->role !== 'bendahara') {
        abort(403);
    }
            $jumlahSantri = Santri::count();
        $jumlahtransaksi = KoperasiTransaction::count();
        $jumlahKamar = Santri::whereNotNull('kamar')->count();


        $ringkasan = KeuanganController::getRingkasanKeuangan();

        return view('bendahara.dashboard.index', [
        'jumlahSantri' => $jumlahSantri,
        'jumlahKamar' => $jumlahKamar,
        'jumlahtransaksi' => $jumlahtransaksi,
        'totalSaldo' => $ringkasan['total_saldo'],
        'totalSppDibayar' => $ringkasan['total_spp'],
        'totalSimpanan' => $ringkasan['total_simpanan'],
        'totaltarik' => $ringkasan['total_penarikan'],
    ]);
    }
    
}
