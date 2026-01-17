<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Santri di Kamar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Anda bisa menambahkan gaya kustom di sini jika diperlukan */
        .glass-effect {
            background-color: rgba(255, 255, 255, 0.8); /* Sedikit transparan */
            backdrop-filter: blur(10px); /* Efek blur */
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .dark .glass-effect {
            background-color: rgba(31, 41, 55, 0.8); /* Dark mode transparan */
            border: 1px solid rgba(55, 65, 81, 0.2);
        }
        /* Basic animation for modals */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen flex flex-col">
    <x-navbar></x-navbar>

    <header class="bg-white dark:bg-gray-800 shadow py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Santri di Kamar {{ $kamar }}
            </h2>
        </div>
    </header>

    <div class="py-12 flex-grow">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-6">
                <a href="{{ route('bendahara.keuangan.index') }}" {{-- Ganti # dengan URL kembali yang sebenarnya --}}
                   class="inline-flex items-center px-6 py-3 bg-green-800 hover:bg-green-900 text-white font-semibold rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                    ← Kembali
                </a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white dark:bg-gray-800 p-4">
                <table class="glass-effect w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3">Nama Santri</th>
                            <th class="px-6 py-3 text-center">Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Data Santri Contoh (Anda perlu mengganti ini dengan data dinamis dari backend Anda) --}}
                        {{-- Anggap $santris adalah array objek santri --}}
                        
                        @foreach ($santris as $santri)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $santri->nama }}</td>
                           <td class="px-6 py-4 whitespace-nowrap text-sm text-center space-x-2">
                                <button onclick="openModal('bayar_spp_{{ $santri->id }}')"
                                        class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition duration-300 ease-in-out transform hover:-translate-y-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0l-4 4m4-4v12" />
                                    </svg>
                                    Bayar SPP
                                </button>
                                <button onclick="openModal('simpan_{{ $santri->id }}')"
                                        class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow transition duration-300 ease-in-out transform hover:-translate-y-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0l-4 4m4-4v12" />
                                    </svg>
                                    Simpan
                                </button>
                                <button onclick="openModal('ambil_{{ $santri->id }}')"
                                        class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg shadow transition duration-300 ease-in-out transform hover:-translate-y-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 8v12a3 3 0 003 3h10a3 3 0 003-3V8m-4 4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Ambil
                                </button>
                                <button onclick="toggleRiwayat({{ $santri->id }})"
                                        class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg shadow transition duration-300 ease-in-out transform hover:-translate-y-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 4 7.5 4S4.168 5.477 3 6.253v13C4.168 18.523 5.754 20 7.5 20S10.832 18.523 12 19.247m0-13c1.168-.776 2.754-2.253 4.5-2.253S18.832 5.477 20 6.253v13C18.832 18.523 17.246 20 15.5 20S13.168 18.523 12 19.247m0-13v13" />
                                    </svg>
                                    Riwayat
                                </button>
                            </td>
                        </tr>

                        {{-- Riwayat Transaksi --}}
                        <tr id="riwayat_{{ $santri->id }}" class="hidden bg-gray-100 dark:bg-gray-900">
                                <td colspan="2" class="px-6 py-4">
                                    <div class="glass-effect rounded-xl p-6 shadow-md">
                                        <h4 class="font-semibold text-lg text-gray-700 dark:text-gray-200 mb-4">Riwayat Transaksi: {{ $santri->nama }}</h4>

                                        @php
                                            $riwayatSantri = $keuangans->where('santri_id', $santri->id);
                                            $total_simpan = $riwayatSantri->where('jenis_transaksi', 'simpanan')->sum('jumlah');
                                            $total_ambil = $riwayatSantri->where('jenis_transaksi', 'penarikan')->sum('jumlah');
                                            $total_spp = $riwayatSantri->where('jenis_transaksi', 'bayar_bulanan')->sum('jumlah');
                                            $currentSaldo = $saldos[$santri->id] ?? 0; // Menggunakan $currentSaldo untuk konsistensi
                                            $tahun = now()->year;
                                            $semuaBulan = collect(range(1, 12))->map(fn($bln) => $tahun . '-' . str_pad($bln, 2, '0', STR_PAD_LEFT));
                                        @endphp

                                        {{-- Tabel Riwayat Transaksi --}}
                                        <div class="overflow-x-auto">
                                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 riwayat-table" id="riwayat_table_{{ $santri->id }}">
                                                <thead class="bg-gray-200 dark:bg-gray-700">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tanggal</th>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Jenis</th>
                                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Jumlah</th>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                                    @forelse ($riwayatSantri as $r)
                                                        <tr>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ $r->tanggal }}</td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ ucfirst(str_replace('_', ' ', $r->jenis_transaksi)) }}</td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-right font-medium text-gray-900 dark:text-gray-300">Rp {{ number_format($r->jumlah, 0, ',', '.') }}</td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ $r->keterangan ?? '-' }}</td>
                                                        </tr>
                                                    @empty
                                                        <tr class="no-results-row">
                                                            <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 text-center">Tidak ada riwayat transaksi</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                        {{-- Pagination Controls --}}
                                        <div id="pagination_controls_{{ $santri->id }}" class="mt-4 flex justify-center items-center space-x-2">
                                        </div>

                                        {{-- Status Pembayaran SPP Bulanan --}}
                                        <div class="flex flex-wrap gap-2 justify-center mt-4">
                                            @foreach ($semuaBulan as $bulan)
                                                @php $sudahBayar = $bayarBulanans[$santri->id]->contains($bulan); @endphp
                                                <div class="px-3 py-1 rounded text-white text-sm {{ $sudahBayar ? 'bg-green-600' : 'bg-gray-400' }} cursor-default select-none">
                                                    {{ \Carbon\Carbon::parse($bulan . '-01')->translatedFormat('F') }}
                                                </div>
                                            @endforeach
                                        </div>

                                        {{-- Ringkasan Keuangan --}}
                                        <div class="mt-4 text-sm space-y-1">
                                            <p><strong>Total Simpan:</strong> <span class="text-green-600">Rp {{ number_format($total_simpan, 0, ',', '.') }}</span></p>
                                            <p><strong>Total Ambil:</strong> <span class="text-red-600">Rp {{ number_format($total_ambil, 0, ',', '.') }}</span></p>
                                            <p><strong>Total SPP:</strong> <span class="text-blue-600">Rp {{ number_format($total_spp, 0, ',', '.') }}</span></p>
                                            <p><strong>Saldo:</strong> <span class="text-purple-600">Rp {{ number_format($saldos[$santri->id] ?? 0, 0, ',', '.') }}</span></p>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        {{-- Modal --}}
                        @foreach (['bayar_spp' => 'Bayar SPP', 'simpan' => 'Simpan Uang', 'ambil' => 'Ambil Uang'] as $jenis => $label)
                        @php
                            $saldo = $saldos[$santri->id] ?? 0;
                        @endphp

                        <div id="{{ $jenis }}_{{ $santri->id }}" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
                            <div class="bg-white dark:bg-white p-6 rounded-2xl shadow-xl w-full max-w-lg relative border border-gray-200 dark:border-gray-600">
                               <h3 class="text-lg font-semibold text-black-800 dark:text-black flex items-center gap-2 mb-4">
                                    <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 1a9 9 0 110 18A9 9 0 0110 1zM9 4h2v6H9V4zm0 8h2v2H9v-2z" />
                                    </svg>
                                    {{ $label }} – {{ $santri->nama }}
                                </h3>

                                <p class="mb-4 text-sm text-gray-600">Saldo saat ini: <strong>Rp {{ number_format($saldo, 0, ',', '.') }}</strong></p>

                                <form action="{{ route('bendahara.keuangan.store') }}" method="POST" onsubmit="return validateForm('{{ $jenis }}', {{ $saldo }}, this)">
                                    @csrf
                                    <input type="hidden" name="santri_id" value="{{ $santri->id }}">
                                    <input type="hidden" name="bendahara_id" value="{{ $bendahara->id }}">
                                    <input type="hidden" name="jenis_transaksi" value="{{ $jenis == 'bayar_spp' ? 'bayar_bulanan' : ($jenis == 'simpan' ? 'simpanan' : 'penarikan') }}">
                                    
                                    @if ($jenis === 'bayar_spp')
                                    <div x-data="{ jumlah: 250000, showManual: {{ $saldo < 250000 ? 'false' : 'true' }} }"
                                        x-init="$refs.manualOverride.value = showManual ? 1 : 0"
                                        x-effect="$refs.manualOverride.value = showManual ? 1 : 0">

                                        <input type="hidden" name="manual_override" x-ref="manualOverride" value="0">

                                        <div class="mb-3">
                                            <label class="block text-sm font-medium text-gray-700">Jumlah Pembayaran</label>
                                            <input type="number" name="jumlah" x-model="jumlah"
                                                :readonly="!showManual"
                                                class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-white"
                                                :class="{ 'bg-gray-100 text-gray-600': !showManual }"
                                                min="1000" required>
                                        </div>

                                        <template x-if="!showManual">
                                            <div class="text-sm text-red-600 mb-2">
                                                Saldo tidak mencukupi untuk pembayaran otomatis (Rp250.000). Silakan input manual.
                                            </div>
                                        </template>

                                        <div class="mb-3">
                                            <button type="button" x-show="!showManual"
                                                    @click="showManual = true"
                                                    class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm px-3 py-1 rounded">
                                                Input Manual
                                            </button>
                                        </div>

                                        <div class="mb-3">
                                            <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                                            <input type="text" name="keterangan" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                        </div>

                                        <div class="mb-3">
                                            <label class="block text-sm font-medium text-gray-700">Tanggal Transaksi</label>
                                            <input type="date" name="tanggal" required class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="{{ now()->toDateString() }}">
                                        </div>

                                        <div class="flex justify-between mt-4">
                                            <button type="submit"
                                                    class="text-white px-4 py-2 rounded"
                                                    :class="{
                                                        'bg-blue-600 hover:bg-blue-700': showManual || jumlah >= 250000,
                                                        'bg-blue-300 cursor-not-allowed': !showManual && jumlah < 250000
                                                    }"
                                                    :disabled="!showManual && jumlah < 250000">
                                                Simpan
                                            </button>
                                            <button type="button" class="close-btn bg-gray-400 text-white px-4 py-2 rounded">Tutup</button>
                                        </div>
                                    </div>
                                    @else
                                        {{-- SIMPAN / AMBIL Modal --}}
                                        <div class="mb-3">
                                            <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                                            <input type="number" name="jumlah" required class="mt-1 block w-full border border-gray-300 rounded-md p-2" min="1000">
                                        </div>

                                        <div class="mb-3">
                                            <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                                            <input type="text" name="keterangan" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                                        </div>

                                        <div class="mb-3">
                                            <label class="block text-sm font-medium text-gray-700">Tanggal Transaksi</label>
                                            <input type="date" name="tanggal" required class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="{{ now()->toDateString() }}">
                                        </div>

                                        <div class="flex justify-between mt-4">
                                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition-all">Simpan</button>
                                            <button type="button" class="close-btn bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg transition">Tutup</button>

                                        </div>
                                    @endif

                                </form>
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Global function to open modals
        function openModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('animate-fadeIn');
            }
        }

        // Event listeners for closing modals
        document.addEventListener('DOMContentLoaded', () => {
            // Close button inside modals
            document.querySelectorAll('.close-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const modal = this.closest('.modal');
                    if (modal) {
                        modal.classList.add('hidden');
                        modal.classList.remove('animate-fadeIn');
                    }
                });
            });

            // Close modal by clicking outside
            document.querySelectorAll('.modal').forEach(modal => {
                modal.addEventListener('click', e => {
                    if (e.target === modal) {
                        modal.classList.add('hidden');
                        modal.classList.remove('animate-fadeIn');
                    }
                });
            });

            // SweetAlert2 for session messages
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    confirmButtonColor: '#22c55e', // Tailwind green-500
                    confirmButtonText: 'OK'
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: "{{ session('error') }}",
                    confirmButtonColor: '#ef4444', // Tailwind red-500
                    confirmButtonText: 'OK'
                });
            @endif
        });

        // Toggle Riwayat section and setup pagination
        function toggleRiwayat(santriId) {
            const riwayatRow = document.getElementById('riwayat_' + santriId);
            if (riwayatRow) {
                riwayatRow.classList.toggle('hidden');
                if (!riwayatRow.classList.contains('hidden')) {
                    setupPagination(santriId);
                }
            }
        }

        // --- Client-Side Pagination Logic ---
        const rowsPerPage = 5; // Number of rows per page

        function setupPagination(santriId) {
            const tableBody = document.querySelector(`#riwayat_table_${santriId} tbody`);
            // Ensure to select only actual data rows, excluding the "no-results-row"
            const rows = Array.from(tableBody.querySelectorAll('tr:not(.no-results-row)'));
            const totalRows = rows.length;
            const totalPages = Math.ceil(totalRows / rowsPerPage);
            let currentPage = 1;

            const paginationControls = document.getElementById(`pagination_controls_${santriId}`);
            if (!paginationControls) return; // Exit if pagination controls not found
            paginationControls.innerHTML = ''; // Clear previous controls

            // Display a message if no transactions exist and hide pagination
            if (totalRows === 0) {
                const noResultsRow = tableBody.querySelector('.no-results-row');
                if (!noResultsRow) { // Only add if it doesn't exist
                    const newNoResultsRow = document.createElement('tr');
                    newNoResultsRow.classList.add('no-results-row');
                    newNoResultsRow.innerHTML = '<td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 text-center">Tidak ada riwayat transaksi</td>';
                    tableBody.appendChild(newNoResultsRow);
                }
                paginationControls.classList.add('hidden'); // Hide pagination controls
                return;
            } else {
                const noResultsRow = tableBody.querySelector('.no-results-row');
                if (noResultsRow) {
                    noResultsRow.remove(); // Remove "no results" row if there are transactions
                }
                paginationControls.classList.remove('hidden'); // Show pagination controls
            }

            function showPage(page) {
                rows.forEach((row, index) => {
                    const start = (page - 1) * rowsPerPage;
                    const end = page * rowsPerPage;

                    if (index >= start && index < end) {
                        row.classList.remove('hidden');
                    } else {
                        row.classList.add('hidden');
                    }
                });
                updatePaginationButtons();
            }

            function updatePaginationButtons() {
                paginationControls.innerHTML = ''; // Clear existing buttons

                // Previous button
                const prevButton = document.createElement('button');
                prevButton.textContent = 'Sebelumnya';
                prevButton.classList.add('px-3', 'py-1', 'rounded-md', 'bg-gray-200', 'dark:bg-gray-700', 'text-gray-700', 'dark:text-gray-200', 'hover:bg-gray-300', 'dark:hover:bg-gray-600');
                if (currentPage === 1) {
                    prevButton.disabled = true;
                    prevButton.classList.add('opacity-50', 'cursor-not-allowed');
                }
                prevButton.onclick = () => {
                    if (currentPage > 1) {
                        currentPage--;
                        showPage(currentPage);
                    }
                };
                paginationControls.appendChild(prevButton);

                // Page numbers
                for (let i = 1; i <= totalPages; i++) {
                    const pageButton = document.createElement('button');
                    pageButton.textContent = i;
                    pageButton.classList.add('px-3', 'py-1', 'rounded-md', 'text-gray-700', 'dark:text-gray-200', 'hover:bg-gray-300', 'dark:hover:bg-gray-600');
                    if (i === currentPage) {
                        pageButton.classList.add('bg-blue-600', 'text-white', 'font-semibold', 'hover:bg-blue-600', 'dark:hover:bg-blue-600');
                    } else {
                        pageButton.classList.add('bg-gray-200', 'dark:bg-gray-700');
                    }
                    pageButton.onclick = () => {
                        currentPage = i;
                        showPage(currentPage);
                    };
                    paginationControls.appendChild(pageButton);
                }

                // Next button
                const nextButton = document.createElement('button');
                nextButton.textContent = 'Berikutnya';
                nextButton.classList.add('px-3', 'py-1', 'rounded-md', 'bg-gray-200', 'dark:bg-gray-700', 'text-gray-700', 'dark:text-gray-200', 'hover:bg-gray-300', 'dark:hover:bg-gray-600');
                if (currentPage === totalPages) {
                    nextButton.disabled = true;
                    nextButton.classList.add('opacity-50', 'cursor-not-allowed');
                }
                nextButton.onclick = () => {
                    if (currentPage < totalPages) {
                        currentPage++;
                        showPage(currentPage);
                    }
                };
                paginationControls.appendChild(nextButton);
            }

            // Initial display
            showPage(currentPage);
        }

        // Form validation using SweetAlert2
        function validateForm(jenis, saldoSaatIni, form) {
            const jumlahInput = form.querySelector('input[name="jumlah"]');
            const jumlah = parseInt(jumlahInput.value);

            if (isNaN(jumlah) || jumlah <= 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Input Tidak Valid',
                    text: 'Jumlah harus berupa angka positif.',
                });
                return false;
            }

            if (jenis === 'ambil' && jumlah > saldoSaatIni) {
                Swal.fire({
                    icon: 'error',
                    title: 'Penarikan Gagal',
                    text: 'Jumlah penarikan melebihi saldo yang tersedia.',
                });
                return false;
            }

            if (jenis === 'bayar_spp') {
                const manualOverrideInput = form.querySelector('input[name="manual_override"]');
                const isManual = manualOverrideInput && manualOverrideInput.value === '1';

                // If not manual override, and current saldo is less than required, and user tries to submit
                if (!isManual && saldoSaatIni < 250000) {
                     Swal.fire({
                        title: 'Gagal Menyimpan',
                        text: 'Saldo tidak cukup untuk pembayaran SPP otomatis (Rp250.000). Silakan lakukan penyimpanan terlebih dahulu atau input manual.',
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                    });
                    return false;
                }
            }

            return true;
        }
    </script>
     <script>
        function toggleRiwayat(id) {
            document.getElementById('riwayat_' + id)?.classList.toggle('hidden');
        }

         function openModal(id) {
            const modal = document.getElementById(id);
            modal.classList.remove('hidden');
            modal.classList.add('animate-fadeIn');
    
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.close-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    btn.closest('.modal')?.classList.add('hidden');
                });
            });

            document.querySelectorAll('.modal').forEach(modal => {
                modal.addEventListener('click', e => {
                    if (e.target === modal) modal.classList.add('hidden');
                });
            });
        });
       function validateForm(jenis, saldo, form) {
    const jumlah = parseInt(form.jumlah.value);

    if (jenis === 'ambil' && jumlah > saldo) {
        Swal.fire({
            icon: 'error',
            title: 'Penarikan Gagal',
            text: 'Jumlah penarikan melebihi saldo!',
        });
        return false;
    }

    if (jenis === 'bayar_spp' && form.manual_override.value != 1 && jumlah > saldo) {
        Swal.fire({
            title: 'Gagal Menyimpan',
    text: 'Saldo tidak cukup, silakan lakukan penyimpanan terlebih dahulu atau pembayaran secara manual',
    icon: 'error',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'OK',

        });
        return false;
    }

    return true;
}

document.addEventListener('DOMContentLoaded', function () {
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            confirmButtonColor: '#22c55e', // Tailwind green-500
            confirmButtonText: 'OK'
        });
    @endif
});
    </script>
</body>
</html>