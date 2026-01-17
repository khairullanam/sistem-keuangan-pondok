<?php

namespace App\Http\Controllers\Koperasi;
use App\Http\Controllers\Controller;
use App\Models\KoperasiTransaction;
use App\Models\Santri;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
class KoperasiTransactionController extends Controller
{
    public function index()
    {
        
         if (auth()->user()->role !== 'koperasi') {
        abort(403);
    }
        $transactions = KoperasiTransaction::with('santri')->latest()->get();
        return view('koperasi.data.index', compact('transactions'));
    }

    public function create()
    {
        $santri = Santri::all();
        return view('koperasi.data.create', compact('santri'));
    }

    public function store(Request $request)
    {

        $santri_id = $request->santri_id;
    $jenis_transaksi = $request->jenis_transaksi; // harusnya "pembelian"

    $kitabList = $request->kitab ?? [];

    foreach ($kitabList as $kitab) {
        // Simpan hanya kalau checkbox dicentang
        if (isset($kitab['checked'])) {
            KoperasiTransaction::create([
                'santri_id'       => $santri_id,
                'jenis_transaksi' => $jenis_transaksi,
                'nama_barang'     => $kitab['nama_barang'],
                'jumlah'          => $kitab['jumlah'] ?? 1,
                'harga_satuan'    => $kitab['harga_satuan'],
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);
        }
    }
    return redirect()->route('koperasi.data.index')->with('success', 'Transaksi berhasil ditambahkan.');


    }
    public function struk($id)
{
    $transaksi = KoperasiTransaction::with(['santri', 'details'])->findOrFail($id);
    return view('koperasi.data.struk', compact('transaksi'));
}

public function simpanPdf($id)
{
    $transaksi = KoperasiTransaction::with('santri', 'details')->findOrFail($id);
    $filename = 'struk-' . $transaksi->id . '.pdf';

    $pdf = Pdf::loadView('koperasi.data.pdf', compact('transaksi'))
              ->setPaper('A5')
              ->setOption(['defaultFont' => 'sans-serif']);

    return $pdf->download($filename); // langsung unduh ke browser
}
    
}
