<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Santri</title>
    @vite(['resources/css/app.css']) 
</head>
<body class="bg-gray-50 font-sans antialiased">

    <div class="min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8">
        <div class="w-full max-w-2xl bg-white rounded-3xl shadow-xl p-8 sm:p-10 lg:p-12 border border-gray-200">
            <h2 class="text-4xl font-extrabold text-gray-900 mb-8 text-center border-b-2 border-green-700 pb-4">
                Tambah Data Santri
            </h2>

            {{-- Flash success message --}}
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 text-green-700 rounded-lg shadow-sm border border-green-200 flex items-center justify-between animate-fade-in">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button type="button" class="text-green-500 hover:text-green-700" onclick="this.closest('div').remove()">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
            @endif

            {{-- Form --}}
            <form method="POST" action="{{ route('admin.santri.store') }}" class="space-y-7">
                @csrf

                @include('admin.santri._form', ['santri' => new \App\Models\Santri])

                <div class="flex justify-end pt-4">
                    <button type="submit" class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold py-3 px-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300 focus:ring-opacity-75">
                        Simpan Data Santri
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>