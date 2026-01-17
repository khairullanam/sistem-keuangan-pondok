
<x-app-layout>
     <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Santri') }}
        </h2>
                <!-- Tabel Santri -->
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3">Nama</th>
                                <th class="px-6 py-3">NIS</th>
                                <th class="px-6 py-3">Alamat</th>
                                <th class="px-6 py-3">Tanggal Lahir</th>
                                <th class="px-6 py-3">Kamar</th>
                                <th class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $santri)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $santri->nama }}
                                </td>
                                <td class="px-6 py-4">{{ $santri->nis }}</td>
                                <td class="px-6 py-4">{{ $santri->alamat }}</td>
                                <td class="px-6 py-4">{{ $santri->tanggal_lahir }}</td>
                                <td class="px-6 py-4">{{ $santri->kamar }}</td>
                                <td class="px-6 py-4 flex gap-2">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.santri.edit', $santri->id) }}"
                                       class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm p-2.5">
                                        ✏️
                                    </a>

                                    <!-- Tombol Hapus -->
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm p-2.5">
                                            🗑️
                                        </button>
                                    </form> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
   
