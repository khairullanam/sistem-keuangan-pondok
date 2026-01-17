<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Struk Pembayaran</title>
    <style>
        body {
            font-family: monospace;
            font-size: 12px;
            padding: 20px;
            color: #000;
        }
        .container {
            max-width: 400px;
            margin: auto;
            border: 1px dashed #333;
            padding: 10px;
        }
        .text-center { text-align: center; }
        .table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .table th, .table td { padding: 4px 0; text-align: left; }
        .table td:last-child, .table th:last-child { text-align: right; }
        .border-top { border-top: 1px dashed #000; margin-top: 10px; padding-top: 5px; }
        .small-text { font-size: 10px; color: #555; }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h3>*** RECEIPT ***</h3>
            <strong>KOPERASI SANTRI</strong><br>
            <p style="font-size: 10px;">
                Alamat: Pondok Modern<br>
                Tanggal: {{ $transaksi->created_at->format('d M Y H:i') }}<br>
                Kasir: {{ $transaksi->kasir->name ?? '-' }}
            </p>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi->details as $item)
                <tr>
                    <td>{{ $item->nama_barang }} x{{ $item->jumlah }}</td>
                    <td>Rp{{ number_format($item->harga_satuan * $item->jumlah, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @php
            $total = $transaksi->details->sum(fn($d) => $d->jumlah * $d->harga_satuan);
            $bayar = $transaksi->jumlah_pembayaran ?? 0;
            $kembalian = $bayar - $total;
        @endphp

        <div class="border-top">
            <p>Total: <strong style="float: right;">Rp{{ number_format($total, 0, ',', '.') }}</strong></p>
            <p>Dibayar: <span style="float: right;">Rp{{ number_format($bayar, 0, ',', '.') }}</span></p>
            <p><strong>Kembalian: <span style="float: right;">Rp{{ number_format($kembalian, 0, ',', '.') }}</span></strong></p>
        </div>

        <div class="text-center" style="margin-top: 20px;">
            <p><strong>Terima Kasih</strong></p>
            <p class="small-text">~ Barang yang sudah dibeli tidak dapat dikembalikan ~</p>
        </div>

        <div class="text-center" style="margin-top: 10px;">
            <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ $transaksi->id }}&size=100x100" alt="QR Code">
            <div class="small-text">ID: {{ $transaksi->id }}</div>
        </div>
    </div>
</body>
</html>
