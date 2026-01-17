<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-10">
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-8 border-b border-gray-200 dark:border-gray-700 pb-4">Statistik Utama</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-6 rounded-lg shadow-md transform hover:scale-103 transition-transform duration-200 ease-in-out">
                            <div class="flex justify-between items-center mb-3">
                                <h3 class="text-lg font-medium text-gray-700 dark:text-gray-300 opacity-90">Jumlah Santri</h3>
                                <svg class="w-9 h-9 text-green-600 dark:text-green-300 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H2v-2a3 3 0 015.356-1.857M7 20v-2m-3 2v-2m-3 2H2m3 0v-2m3 2v-2m-3 2a3 3 0 005.356-1.857M17 20a3 3 0 005.356-1.857"></path></svg>
                            </div>
                            <p class="text-5xl font-extrabold text-green-700 dark:text-green-300">{{ $jumlahSantri }}</p>
                        </div>

                        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-6 rounded-lg shadow-md transform hover:scale-103 transition-transform duration-200 ease-in-out">
                            <div class="flex justify-between items-center mb-3">
                                <h3 class="text-lg font-medium text-gray-700 dark:text-gray-300 opacity-90">Jumlah Kamar</h3>
                                <svg class="w-9 h-9 text-green-600 dark:text-green-300 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2h14z"></path></svg>
                            </div>
                            <p class="text-5xl font-extrabold text-green-700 dark:text-green-300">{{ $jumlahKamar }}</p>
                        </div>

                        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-6 rounded-lg shadow-md transform hover:scale-103 transition-transform duration-200 ease-in-out">
                            <div class="flex justify-between items-center mb-3">
                                <h3 class="text-lg font-medium text-gray-700 dark:text-gray-300 opacity-90">Transaksi Koperasi</h3>
                                <svg class="w-9 h-9 text-green-600 dark:text-green-300 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 1.5M6 7l3-1m-3 1l-3-1.5M6 7l3 1.5M6 7v-3m3 1.5L9 3m3 6l-3-1m3 1l-3 1.5M12 9l3-1m-3 1l-3-1.5M12 9v-3m-3 1.5L9 3m3 6l-3 1m3-1l3 1.5m-3-1l3-1.5m-3 1v-3m3 1.5L15 3"></path></svg>
                            </div>
                            <p class="text-5xl font-extrabold text-green-700 dark:text-green-300">{{ $jumlahtransaksi }}</p>
                        </div>
                    </div>

                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mt-12 mb-8 border-b border-gray-200 dark:border-gray-700 pb-4">Ringkasan Keuangan</h3>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                        <div class="bg-white dark:bg-gray-800 border   p-6 rounded-lg shadow-md border-t-4 border-green-300 dark:border-green-700 flex flex-col items-center justify-center text-center transform hover:scale-103 transition-transform duration-200 ease-in-out">
                            <svg class="w-12 h-12 text-green-500 dark:text-green-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8V6m0 6v2m0 8a9 9 0 110-18 9 9 0 010 18z"></path></svg>
                            <h4 class="text-xl font-medium text-gray-700 dark:text-gray-300 mb-2">Total Simpanan</h4>
                            <div class="text-4xl font-extrabold text-green-600 dark:text-green-300">Rp {{ number_format($totalSimpanan, 0, ',', '.') }}</div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 border p-6 rounded-lg shadow-md border-t-4 border-green-300 dark:border-green-700 flex flex-col items-center justify-center text-center transform hover:scale-103 transition-transform duration-200 ease-in-out">
                            <svg class="w-12 h-12 text-green-500 dark:text-green-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <h4 class="text-xl font-medium text-gray-700 dark:text-gray-300 mb-2">Total SPP Dibayar</h4>
                            <div class="text-4xl font-extrabold text-green-600 dark:text-green-300">Rp {{ number_format($totalSppDibayar, 0, ',', '.') }}</div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 border  p-6 rounded-lg shadow-md border-t-4 border-green-300 dark:border-green-700 flex flex-col items-center justify-center text-center transform hover:scale-103 transition-transform duration-200 ease-in-out">
                            <svg class="w-12 h-12 text-green-500 dark:text-green-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <h4 class="text-xl font-medium text-gray-700 dark:text-gray-300 mb-2">Total Saldo Santri</h4>
                            <div class="text-4xl font-extrabold text-green-600 dark:text-green-300">Rp {{ number_format($totalSaldo, 0, ',', '.') }}</div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 border  p-6 rounded-lg shadow-md border-t-4 border-green-300 dark:border-green-700 flex flex-col items-center justify-center text-center transform hover:scale-103 transition-transform duration-200 ease-in-out">
                            <svg class="w-12 h-12 text-green-500 dark:text-green-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            <h4 class="text-xl font-medium text-gray-700 dark:text-gray-300 mb-2">Total Penarikan</h4>
                            <div class="text-4xl font-extrabold text-green-600 dark:text-green-300">Rp {{ number_format($totaltarik, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>