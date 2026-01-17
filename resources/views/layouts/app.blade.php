<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <style>
            @keyframes fadeIn {
                from { opacity: 0; transform: scale(0.70); }
                to { opacity: 1; transform: scale(1); }
                }

                .animate-fadeIn {
                animation: fadeIn 0.3s ease-out forwards;
                }
        </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

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
                {{ $slot }}
            </main>
        </div>

      

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
