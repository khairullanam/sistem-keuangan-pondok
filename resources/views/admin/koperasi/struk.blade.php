<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Struk Pembayaran Koperasi') }}
        </h2>
    </x-slot>


    <div class="py-12 bg-gray-100 dark:bg-gray">

        <div class="max-w-md mx-auto bg-white border border-dashed border-gray-400 rounded-lg shadow-lg px-6 py-4 font-mono text-sm">
            <div class="text-center border-b border-dashed pb-2 mb-2">
                <h1 class="text-lg font-bold tracking-widest">*** RECEIPT ***</h1>
                <h2 class="text-sm font-semibold mt-1">KOPERASI SANTRI</h2>
                <div class="mt-1 text-xs">
                    <p>Alamat: Pondok Modern</p>
                    <p>Tanggal: {{ $transaksi->created_at->format('d M Y H:i') }}</p>
                    <p>Kasir: {{ auth()->user()->name }}</p>
                </div>
            </div>

            <table class="w-full text-left mb-3">
                <thead class="border-b border-dashed">
                    <tr>
                        <th class="py-1">Deskripsi</th>
                        <th class="py-1 text-right">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi->details as $item)
                        <tr>
                            <td class="py-0.5">{{ $item->nama_barang }} x{{ $item->jumlah }}</td>
                            <td class="py-0.5 text-right">Rp{{ number_format($item->harga_satuan * $item->jumlah, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @php
                $total = $transaksi->details->sum(fn($d) => $d->jumlah * $d->harga_satuan);
                $bayar = $transaksi->jumlah_pembayaran ?? 0;
                $kembalian = $bayar - $total;
            @endphp

            <div class="border-t border-dashed pt-2 text-sm space-y-1">
                <p class="flex justify-between"><span>Total:</span> <span>Rp{{ number_format($total, 0, ',', '.') }}</span></p>
                <p class="flex justify-between"><span>Dibayar:</span> <span>Rp{{ number_format($bayar, 0, ',', '.') }}</span></p>
                <p class="flex justify-between font-bold"><span>Kembalian:</span> <span>Rp{{ number_format($kembalian, 0, ',', '.') }}</span></p>
            </div>

            <div class="mt-4 text-center border-t border-dashed pt-2">
                <p class="uppercase font-semibold tracking-wide text-xs">Terima Kasih</p>
                <p class="text-[10px] text-gray-500">~ Barang yang sudah dibeli tidak dapat dikembalikan ~</p>
            </div>

            <div class="mt-4 flex justify-center">
                <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ $transaksi->id }}&size=120x120" alt="QR Code">
            </div>

            <div class="text-center text-xs tracking-widest mt-2">
                ID: {{ $transaksi->id }}
            </div>
        </div>
    </div>
</x-app-layout>
