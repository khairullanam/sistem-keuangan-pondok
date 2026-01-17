<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('santri.dashboard')" :active="request()->routeIs('santri.dashboard')">
                            {{ __('Dashboard Santri') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('santri.history')" :active="request()->routeIs('santri.history')">
                            {{ __('riwayat') }}
                        </x-nav-link>
                    </div>

                
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-start px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                {{ __('Log Out') }}
                            </button>
                        </form>

                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('koperasi.dashboard')" :active="request()->routeIs('koperasi.dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
<div                                class="glass-effect rounded-xl p-6 shadow-md">
                                        <h4 class="font-semibold text-lg text-gray-700 dark:text-gray-200 mb-4">Riwayat Transaksi: {{ $santri->nama }}</h4>

                                        @php
                                            $riwayatSantri = $transaksis->where('santri_id', $santri->id);
                                            $total_simpan = $riwayatSantri->where('jenis_transaksi', 'simpanan')->sum('jumlah');
                                            $total_ambil = $riwayatSantri->where('jenis_transaksi', 'penarikan')->sum('jumlah');
                                            $total_spp = $riwayatSantri->where('jenis_transaksi', 'bayar_bulanan')->sum('jumlah');
                                            $saldo = $total_simpan - $total_ambil;
                                            $bulanBayar = $bayarBulanans[$santri->id] ?? collect();
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
                                                @php $sudahBayar = collect($bulanBayar)->contains($bulan); @endphp
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
                                            <p><strong>Saldo:</strong> <span class="text-purple-600">Rp {{ number_format($saldo[$santri->id]??0, 0, ',', '.') }}</span></p>
                                            <p class="mb-4 text-sm text-gray-600">Saldo saat ini: <strong>Rp {{ number_format($saldo, 0, ',', '.') }}</strong></p>
                                        
                                            </div>
                                    </div>

            
                  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
            </main>
        </div>

        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
            <script>
        function toggleRiwayat(id) {
            document.getElementById('riwayat_' + id)?.classList.toggle('hidden');
        }

        function openModal(id) {
            document.getElementById(id)?.classList.remove('hidden');
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
    </script>

    </body>
</html>