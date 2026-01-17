<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi Kitab</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-50 font-sans antialiased">
    <div class="min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8">
        <div class="bg-white shadow-xl rounded-3xl p-8 sm:p-10 lg:p-12 w-full max-w-3xl border border-gray-200">
            <h2 class="text-4xl font-extrabold mb-8 text-center text-gray-800 border-b-2 border-green-700 pb-4">
                Tambah Pembelian Kitab
            </h2>

            <form action="{{ route('admin.koperasi.store') }}" method="POST" class="space-y-7">
                @csrf

                <div class="mb-4">
                    <label for="santri_id" class="block text-sm font-semibold text-gray-800 mb-2">Pilih Santri</label>
                    <select name="santri_id" id="santri_id" required
                            class="w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-green-700 focus:border-green-700 transition duration-150 ease-in-out">
                        @foreach($santri as $s)
                            <option value="{{ $s->id }}">{{ $s->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="hidden" name="jenis_transaksi" value="pembelian">

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-800 mb-2">Daftar Kitab</label>
                    <div class="space-y-4">
                        @php
                            $kitabList = [
                                ['nama' => 'Tafsir Jalalain', 'harga' => 55000],
                                ['nama' => 'Bulughul Maram', 'harga' => 65000],
                                ['nama' => 'Riyadhus Shalihin', 'harga' => 60000],
                                ['nama' => 'Al-Ajurumiyyah', 'harga' => 40000],
                            ];
                        @endphp

                        @foreach($kitabList as $index => $kitab)
                            <div class="flex items-center gap-4 bg-gray-50 border border-gray-200 p-4 rounded-lg shadow-sm hover:shadow-md transition duration-200 ease-in-out">
                                <input type="checkbox" id="kitab_{{ $index }}" name="kitab[{{ $index }}][checked]"
                                        class="w-6 h-6 accent-green-600 bg-gray-100 border-gray-300 rounded cursor-pointer kitab-checkbox">

                                <div class="flex-1">
                                    <label for="kitab_{{ $index }}" class="font-bold text-lg text-gray-900 cursor-pointer">{{ $kitab['nama'] }}</label>
                                    <input type="hidden" name="kitab[{{ $index }}][nama_barang]" value="{{ $kitab['nama'] }}">
                                    <input type="hidden" name="kitab[{{ $index }}][jumlah]" value="1">

                                    <div class="flex items-center mt-1">
                                        <span class="text-gray-600 text-sm mr-1">Harga:</span>
                                        <span class="font-medium text-green-700 text-lg whitespace-nowrap">
    Rp. {{ number_format($kitab['harga'], 0, ',', '.') }}
    <input type="hidden" name="kitab[{{ $index }}][harga_satuan]" value="{{ $kitab['harga'] }}">
</span>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-4">
                    <label for="total_display" class="block text-sm font-semibold text-gray-800 mb-2">Total Pembelian (Rp)</label>
                    <input type="text" id="total_display"
                           class="w-full border border-gray-300 rounded-lg shadow-sm p-3 bg-gray-100 text-gray-700 font-bold text-xl pointer-events-none" readonly value="0">
                    <input type="hidden" id="total" name="jumlah_pembayaran" value="0">
                </div>

                <div class="mb-4">
                    <label for="metode_pembayaran" class="block text-sm font-semibold text-gray-800 mb-2">Metode Pembayaran</label>
                    <select name="metode_pembayaran" id="metode_pembayaran" required
                            class="w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-green-500 focus:border-green-500 transition duration-150 ease-in-out">
                        <option value="tunai">Tunai</option>
                        <option value="transfer">Transfer</option>
                        <option value="qris">QRIS</option>
                    </select>
                </div>

                <div class="text-center pt-4">
                    <button type="submit"
                            class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold py-3 px-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300 focus:ring-opacity-75">
                        Simpan Transaksi
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const checkboxes = document.querySelectorAll('.kitab-checkbox');
        const totalInput = document.getElementById('total');
        const totalDisplay = document.getElementById('total_display');

        function updateTotal() {
            let total = 0;
            checkboxes.forEach(cb => {
                if (cb.checked) {
                    const hargaInput = cb.closest('.flex.items-center.gap-4').querySelector('input[name*="harga_satuan"]');
                    total += parseFloat(hargaInput.value.replace(/\./g, '').replace(',', '.')) || 0;
                }
            });
            totalInput.value = total;
            totalDisplay.value = new Intl.NumberFormat('id-ID').format(total); // Format for display
        }

        // Add event listeners to all checkboxes
        checkboxes.forEach(cb => cb.addEventListener('change', updateTotal));

        // Initial calculation when the page loads
        document.addEventListener('DOMContentLoaded', updateTotal);
    </script>
</body>
</html>