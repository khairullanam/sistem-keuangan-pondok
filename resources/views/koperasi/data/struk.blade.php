<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Struk Pembayaran</title>

            <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
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
                        <x-nav-link :href="route('koperasi.dashboard')" :active="request()->routeIs('koperasi.dashboard')">
                            {{ __('Dashboard Koperasi') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('koperasi.data.index')" :active="request()->routeIs('koperas.data')">
                            {{ __('koperasi ') }}
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
    <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Struk Pembayaran Koperasi') }}
        </h2>
                    </div>
                </header>
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
</body>
</html>
