<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Manajemen Keuangan Santri') }} {{-- Judul lebih deskriptif --}}
        </h2>
        <p class="text-md text-gray-600 dark:text-gray-300 mt-1">Kelola data keuangan dan transaksi pembayaran santri.</p>
    </x-slot>

    <div class="py-10"> {{-- Sesuaikan py-12 menjadi py-10 untuk konsistensi --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- --- BAGIAN FORM FILTER BULAN --- --}}
            {{-- Terapkan glass-effect pada kontainer form --}}
            <!-- <div class="glass-effect rounded-xl p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">Filter Transaksi Berdasarkan Bulan</h3>
                <form method="GET" action="{{ route('admin.keuangan.index') }}" class="flex flex-col sm:flex-row items-end gap-4">
                    <div class="flex-grow"> {{-- Agar input bisa lebih lebar --}}
                        <label for="bulan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Pilih Bulan & Tahun</label>
                        <input type="month" name="bulan" id="bulan" value="{{ request('bulan') }}"
                            class="block w-full px-4 py-2 bg-white dark:bg-gray-700 text-gray-800 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-6 py-2 bg-green-800 hover:bg-green-900 text-white font-semibold rounded-lg shadow transition duration-300 ease-in-out transform hover:-translate-y-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01.293.707V19a2 2 0 01-2 2H7a2 2 0 01-2-2V7.293a1 1 0 01.293-.707L3 4zm1 2h16l-3.5 7H7L4 6z" />
                        </svg>
                        Tampilkan Data
                    </button>
                </form>
            </div> -->

            {{-- --- BAGIAN KARTU PILIH KAMAR --- --}}
            <div class="glass-effect rounded-xl p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">Pilih Kamar Untuk Melihat Detail Keuangan</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @forelse ($santris->groupBy('kamar') as $kamar => $group)
                        <a href="{{ route('admin.keuangan.kamar', ['kamar' => $kamar, 'bulan' => request('bulan')]) }}"
                           class="block glass-effect rounded-xl p-4 shadow-md hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1
                                  text-blue-800 dark:text-white border border-gray-200 dark:border-gray-700"> {{-- Hapus bg-white, dark:bg-gray-800, gunakan glass-effect --}}
                            <div class="flex items-center gap-4"> {{-- Tingkatkan gap --}}
                                <div class="p-3 rounded-full bg-green-800 text-white dark:bg-green-700 dark:text-white flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" {{-- Ukuran ikon lebih besar --}}
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M5 17h14"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xl font-bold text-gray-800 dark:text-white">Kamar {{ $kamar }}</p> {{-- Font lebih tebal --}}
                                    <p class="text-sm text-gray-800 dark:text-gray-300 mt-1">{{ $group->count() }} santri</p> {{-- Warna teks lebih sesuai --}}
                                </div>
                            </div>
                        </a>
                    @empty
                        <p class="col-span-full text-center py-8 text-lg text-gray-500 dark:text-gray-400">Tidak ada data kamar tersedia.</p>
                    @endforelse
                </div>
            </div>

            {{-- --- BAGIAN RINGKASAN KEUANGAN (OPSIONAL) --- --}}
            {{-- Anda bisa menambahkan kartu ringkasan keuangan di sini, misalnya total pemasukan/pengeluaran --}}
            {{-- Contoh struktur: --}}
            {{--
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <div class="glass-effect rounded-xl p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Total Pemasukan Bulan Ini</h3>
                    <p class="text-3xl font-bold text-green-600 dark:text-green-400">Rp 12.500.000</p>
                </div>
                <div class="glass-effect rounded-xl p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Total Pengeluaran Bulan Ini</h3>
                    <p class="text-3xl font-bold text-red-600 dark:text-red-400">Rp 3.200.000</p>
                </div>
            </div>
            --}}

        </div>
    </div>
</x-app-layout>