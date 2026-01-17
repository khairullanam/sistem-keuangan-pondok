<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Dashboard Koperasi') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-end mb-6">
                <a href="{{ route('admin.koperasi.create') }}"
                   class="inline-flex items-center px-6 py-3 bg-green-800 hover:bg-green-900 text-white font-semibold rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Tambah Transaksi Baru
                </a>
            </div>

            {{-- --- BAGIAN TABLE / KARTU UTAMA --- --}}
            <div class="glass-effect rounded-xl p-6 mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-200">Daftar Transaksi Koperasi</h3>
                </div>

                <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-gray-700 dark:text-gray-300">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">No</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Nama Santri</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Jenis Transaksi</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Nama Barang</th>
                                <th scope="col" class="px-4 py-3 text-right text-xs font-semibold uppercase tracking-wider">Harga Satuan</th>
                                <th scope="col" class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider">Jumlah</th>
                                <th scope="col" class="px-4 py-3 text-right text-xs font-semibold uppercase tracking-wider">Total</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Tanggal</th>
                                <th scope="col" class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @php $no = 1; @endphp
                            @forelse ($transactions as $index => $t)
                                @foreach ($t->details as $i => $d)
                                    <tr class="hover:bg-blue-50 dark:hover:bg-gray-700 transition duration-150 ease-in-out">
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            @if($i === 0)
                                                {{ $no++ }}
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">{{ $i === 0 ? $t->santri->nama : '' }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">{{ $i === 0 ? ucfirst($t->jenis_transaksi) : '' }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">{{ $d->nama_barang }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-right">Rp {{ number_format($d->harga_satuan, 0, ',', '.') }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-center">{{ $d->jumlah }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-right font-bold text-green-500 dark:text-green-400">
                                            Rp {{ number_format($d->jumlah * $d->harga_satuan, 0, ',', '.') }}
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-gray-600 dark:text-gray-400">{{ \Carbon\Carbon::parse($t->created_at)->format('d M Y') }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-center">
                                            @if($i === 0)
                                                <div class="flex flex-col items-center space-y-2">
                                                    <a href="{{ route('admin.koperasi.struk', $t->id) }}"
                                                       class="w-[50px] inline-flex justify-center items-center gap-2 px-3 py-2 rounded-lg text-sm font-medium text-white bg-green-800 hover:bg-green-800 shadow-md transition duration-300 ease-in-out transform hover:-translate-y-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                       
                                                    </a>

                                                    <a href="{{ route('admin.koperasi.pdf.simpan', $t->id) }}"
                                                       class="w-[50px] inline-flex justify-center items-center gap-2 px-3 py-2 rounded-lg text-sm font-medium text-white bg-red-500 hover:bg-red-600 shadow-md transition duration-300 ease-in-out transform hover:-translate-y-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center py-6 text-gray-500 dark:text-gray-400 text-lg">Tidak ada transaksi yang tersedia saat ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>