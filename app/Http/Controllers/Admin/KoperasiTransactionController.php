<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\KoperasiTransaction;
use App\Models\Santri;
use Illuminate\Http\Request;
use App\Models\KoperasiTransactionDetail;
use App\Http\Controllers\Admin\KeuanganController;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class KoperasiTransactionController extends Controller
{
    public function index()
    {
        
         if (auth()->user()->role !== 'admin') {
        abort(403);
    }
        $transactions = KoperasiTransaction::with(['santri', 'details'])->latest()->get();
        return view('admin.koperasi.index', compact('transactions'));
    }

    public function create()
    {
        $santri = Santri::all();
        return view('admin.koperasi.create', compact('santri'));
    }



public function store(Request $request)
{
    $santri_id = $request->santri_id;
    $jenis_transaksi = $request->jenis_transaksi;

    // Simpan transaksi utamanya dulu
    $transaksi = KoperasiTransaction::create([
        'santri_id' => $santri_id,
        'jenis_transaksi' => $jenis_transaksi,
        'metode_pembayaran' => $request->metode_pembayaran,
        'jumlah_pembayaran' => $request->jumlah_pembayaran,
    ]);

    // Simpan detail barangnya
    $kitabList = $request->kitab ?? [];
    foreach ($kitabList as $kitab) {
        if (isset($kitab['checked'])) {
            KoperasiTransactionDetail::create([
                'koperasi_transaction_id' => $transaksi->id,
                'nama_barang' => $kitab['nama_barang'],
                'jumlah' => $kitab['jumlah'] ?? 1,
                'harga_satuan' => $kitab['harga_satuan'],
            ]);
        }
    }

            $total = 0;
        foreach ($kitabList as $kitab) {
            if (isset($kitab['checked'])) {
                $total += $kitab['harga_satuan'] * ($kitab['jumlah'] ?? 1);
            }
        }

        if ($request->jumlah_pembayaran < $total) {
            return back()->withErrors(['jumlah_pembayaran' => 'Jumlah pembayaran tidak mencukupi total pembelian.']);
        }


    return redirect()->route('admin.koperasi.index')->with('success', 'Transaksi berhasil ditambahkan.');
}
public function struk($id)
{
    $transaksi = KoperasiTransaction::with(['santri', 'details'])->findOrFail($id);
    return view('admin.koperasi.struk', compact('transaksi'));
}

public function simpanPdf($id)
{
    $transaksi = KoperasiTransaction::with('santri', 'details')->findOrFail($id);
    $filename = 'struk-' . $transaksi->id . '.pdf';

    $pdf = Pdf::loadView('admin.koperasi.pdf', compact('transaksi'))
              ->setPaper('A5')
              ->setOption(['defaultFont' => 'sans-serif']);

    return $pdf->download($filename); // langsung unduh ke browser
}

// public function cetakPdf($id)
// {
//     $transaksi = KoperasiTransaction::with('details', 'santri')->findOrFail($id);

//     $pdf = Pdf::loadView('admin.koperasi.pdf', compact('transaksi'))
//               ->setPaper('A5')
//               ->setOption(['defaultFont' => 'sans-serif']);

//     return $pdf->stream('struk-pembayaran-' . $transaksi->id . '.pdf');
// }
}
