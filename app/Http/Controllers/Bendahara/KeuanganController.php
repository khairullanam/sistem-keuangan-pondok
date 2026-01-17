<?php
namespace App\Http\Controllers\Bendahara;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Keuangan;
use App\Models\Santri;
use App\Models\Bendahara;
class KeuanganController extends Controller
{
    public static function getRingkasanKeuangan()
{
    $totalSimpanan = Keuangan::where('jenis_transaksi', 'simpanan')->sum('jumlah');
    $totalPenarikan = Keuangan::where('jenis_transaksi', 'penarikan')->sum('jumlah');
// SPP tanpa manual override (transaksi normal)
$totalSPPNormal = Keuangan::where('jenis_transaksi', 'bayar_bulanan')
    ->where(function ($query) {
        $query->where('manual_override', false)->orWhereNull('manual_override');
    })
    ->sum('jumlah');

// SPP dengan manual override
$totalSPPManual = Keuangan::where('jenis_transaksi', 'bayar_bulanan')
    ->where('manual_override', true)
    ->sum('jumlah');

    $totalSaldo = $totalSimpanan - $totalPenarikan - $totalSPPNormal;

// Total SPP dari semua transaksi
$totalSPP = $totalSPPNormal + $totalSPPManual;
    return [
        'total_simpanan' => $totalSimpanan,
        'total_penarikan' => $totalPenarikan,
        'total_spp' => $totalSPP,
        'total_saldo' => $totalSaldo,
    ];
}

    public function kamar($kamar, Request $request)
{
    $bulan = $request->input('bulan');
    $bulan_terpilih = $bulan ?? now()->format('Y-m'); // default: bulan ini

    $santris = Santri::where('kamar', $kamar)->get();
    $keuangans = Keuangan::whereIn('santri_id', $santris->pluck('id'))->get();

    // Hitung bulan yang sudah dibayar per santri
    $bayarBulanans = [];
    foreach ($santris as $santri) {
        $bayarBulanans[$santri->id] = $keuangans
            ->where('santri_id', $santri->id)
            ->where('jenis_transaksi', 'bayar_bulanan')
            ->map(fn ($item) => \Carbon\Carbon::parse($item->tanggal)->format('Y-m'))
            ->unique()
            ->values();
    }

     $saldos = [];
        foreach ($santris as $santri) {
            $riwayat = $keuangans->where('santri_id', $santri->id);
            $total_simpan = $riwayat->where('jenis_transaksi', 'simpanan')->sum('jumlah');
            $total_ambil = $riwayat->where('jenis_transaksi', 'penarikan')->sum('jumlah');
            $total_spp = $riwayat->where('jenis_transaksi', 'bayar_bulanan')
                                ->where('manual_override', false)
                                ->sum('jumlah');
            $saldos[$santri->id] = $total_simpan - $total_ambil - $total_spp;
                                        }

    $bendahara = Bendahara::first();
    // Kirim ke view
    return view('bendahara.keuangan.kamar', compact(
        'kamar',
        'santris',
        'keuangans',
        'bayarBulanans',
        'bulan_terpilih',
        'bendahara',
        'saldos'
    ));
}

private function hitungSaldo($santriId)
{
    $keuangans = Keuangan::where('santri_id', $santriId)->get();
    
    $total_simpan = $keuangans->where('jenis_transaksi', 'simpanan')->sum('jumlah');
    $total_ambil = $keuangans->where('jenis_transaksi', 'penarikan')->sum('jumlah');
    
    // Hanya hitung SPP jika bukan manual
    $total_spp = $keuangans
        ->where('jenis_transaksi', 'bayar_bulanan')
        ->where('manual_override', false)
        ->sum('jumlah');

    return $total_simpan - $total_ambil - $total_spp;
}
    
   public function store(Request $request)
{
    $request->validate([
    'santri_id' => 'required|exists:santris,id',
    'bendahara_id' => 'required|exists:bendaharas,id',
    'jenis_transaksi' => 'required|in:bayar_bulanan,simpanan,penarikan',
    'jumlah' => 'required|integer|min:1000',
    'tanggal' => 'required|date',
    'keterangan' => 'nullable|string',
    'manual_override' => 'nullable|in:0,1',
]);

 $isManual = $request->input('manual_override') == 1;
    $jenis = $request->input('jenis_transaksi');
    $jumlah = $request->input('jumlah');
    $santriId = $request->input('santri_id');
    $saldoSaatIni = $this->hitungSaldo($santriId);



    // Validasi saldo jika bukan manual
    if (!$isManual && in_array($jenis, ['penarikan', 'bayar_bulanan'])) {
        $saldo = $this->hitungSaldo($santriId);
        if ($jumlah > $saldo) {
            return back()->withErrors(['jumlah' => 'Saldo tidak mencukupi']);
        }
    }

    $tanggalInput = $request->tanggal;
if (strlen($tanggalInput) === 7) { // format 'YYYY-MM'
    $tanggalInput .= '-01'; // ubah jadi 'YYYY-MM-01'
}

   Keuangan::create([
    'santri_id' => $santriId,
    'bendahara_id' => $request->bendahara_id,
    'jenis_transaksi' => $jenis,
    'jumlah' => $jumlah,
    'tanggal' => $request->tanggal,
    'keterangan' => $request->keterangan,
    'manual_override' => $isManual,
]);
    return redirect()->back()->with('success', 'Transaksi berhasil disimpan.');
}



public function index(Request $request)
{
    if (auth()->user()->role !== 'bendahara') {
        abort(403);
    }
    // Ambil parameter bulan dari form
    $bulan = $request->input('bulan');

    // Filter keuangan jika bulan dipilih
    $keuangans = Keuangan::with(['santri', 'bendahara'])
        ->when($bulan, function ($query) use ($bulan) {
            $tanggal = Carbon::parse($bulan);
            $query->whereMonth('tanggal', $tanggal->month)
                  ->whereYear('tanggal', $tanggal->year);
        })
        ->get();

    // Ambil semua santri dan relasi keuangannya (untuk modal/form transaksi)
    $santris = Santri::with('keuangans')->get();

    // Ambil bendahara 
    $bendahara = Bendahara::first();

    // Perhitungan hanya untuk transaksi simpanan dan penarikan
    $total_simpan = $keuangans->where('jenis_transaksi', 'simpanan')->sum('jumlah');
    $total_ambil = $keuangans->where('jenis_transaksi', 'penarikan')->sum('jumlah');
    $saldo = $total_simpan - $total_ambil;

    // Format bulan terpilih
    $bulan_terpilih = $bulan ? Carbon::parse($bulan)->translatedFormat('F Y') : null;

    // Ambil data pembayaran SPP per santri, grupkan berdasarkan santri dan format bulan (YYYY-MM)
    $bayarBulanans = Keuangan::where('jenis_transaksi', 'bayar_bulanan')
    ->get()
    ->groupBy('santri_id')
    ->map(function ($items) {
        return $items->map(function ($item) {
            return Carbon::parse($item->tanggal)->format('Y-m');
        })->unique()->values();
    });

   return view('bendahara.keuangan.index', compact(
    'keuangans',
    'santris',
    'bendahara',
    'total_simpan',
    'total_ambil',
    'saldo',
    'bulan_terpilih',
    'bayarBulanans'  // <-- kirim data ini ke view
));

}
}
