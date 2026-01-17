<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Data Santri') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-end mb-6">
                <a href="{{ route('admin.santri.create') }}"
                   class="inline-flex items-center px-6 py-3 bg-green-800 hover:bg-green-700 text-white font-bold rounded-xl shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Tambah Santri Baru
                </a>
            </div>

            <div class="glass-effect dark:glass-effect rounded-xl p-6 mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-200">Daftar Santri Terdaftar</h3>
                </div>

                <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-gray-700 dark:text-gray-300">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">No</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Nama</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">NIS</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Alamat</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Tgl. Lahir</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Kamar</th>
                                <th scope="col" class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @php
                                // Calculate the starting number for the current page
                                $startNumber = ($data->currentPage() - 1) * $data->perPage() + 1;
                            @endphp
                            @forelse ($data as $santri)
                            <tr class="hover:bg-blue-50 dark:hover:bg-gray-700 transition duration-150 ease-in-out">
                                <td class="px-4 py-3 whitespace-nowrap">{{ $startNumber++ }}</td>
                                <td class="px-4 py-3 whitespace-nowrap font-medium text-gray-900 dark:text-white">{{ $santri->nama }}</td>
                                <td class="px-4 py-3 whitespace-nowrap">{{ $santri->nis }}</td>
                                <td class="px-4 py-3 whitespace-nowrap">{{ $santri->alamat }}</td>
                                <td class="px-4 py-3 whitespace-nowrap">{{ \Carbon\Carbon::parse($santri->tanggal_lahir)->format('d M Y') }}</td>
                                <td class="px-4 py-3 whitespace-nowrap">{{ $santri->kamar }}</td>
                                <td class="px-4 py-3 whitespace-nowrap flex gap-2 justify-center items-center">
                                    <a href="{{ route('admin.santri.edit', $santri->id) }}"
                                       class="inline-flex items-center justify-center text-white bg-green-800 hover:bg-green-900 font-medium rounded-lg text-sm p-2.5 shadow-sm transition duration-150 ease-in-out transform hover:scale-105">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                    <button type="button"
                                            onclick="showDeleteModal('{{ $santri->id }}', '{{ $santri->nama }}')"
                                            class="inline-flex items-center justify-center text-white bg-red-500 hover:bg-red-600 font-medium rounded-lg text-sm p-2.5 shadow-sm transition duration-150 ease-in-out transform hover:scale-105">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>

                                    <form id="delete-form-{{ $santri->id }}"
                                          action="{{ route('admin.santri.destroy', $santri->id) }}"
                                          method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-6 text-gray-500 dark:text-gray-400 text-lg">Tidak ada data santri yang tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                    {{-- Custom Pagination --}}
                @if ($data->hasPages())
                    <div class="flex justify-center mt-4">
                        <nav class="inline-flex items-center space-x-1" aria-label="Pagination">
                            {{-- Previous Page Link --}}
                            @if ($data->onFirstPage())
                                <span class="px-4 py-2 text-sm font-medium text-gray-400 bg-gray-200 rounded-lg">←</span>
                            @else
                                <a href="{{ $data->previousPageUrl() }}"
                                class="px-4 py-2 text-sm font-medium text-white bg-green-800 hover:bg-green-900 rounded-lg shadow-sm transition duration-150 ease-in-out transform hover:scale-105">←</a>
                            @endif

                            {{-- Page Number Links --}}
                            @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                                @if ($page == $data->currentPage())
                                    <span class="px-4 py-2 text-sm font-bold text-white bg-green-800 rounded-lg shadow"> {{ $page }} </span>
                                @else
                                    <a href="{{ $url }}"
                                    class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-white hover:bg-green-700 rounded-lg shadow-sm transition duration-150 ease-in-out transform hover:scale-105">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($data->hasMorePages())
                                <a href="{{ $data->nextPageUrl() }}"
                                class="px-4 py-2 text-sm font-medium text-white bg-green-800 hover:bg-green-900 rounded-lg shadow-sm transition duration-150 ease-in-out transform hover:scale-105">→</a>
                            @else
                                <span class="px-4 py-2 text-sm font-medium text-gray-400 bg-gray-200 rounded-lg">→</span>
                            @endif
                        </nav>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <div id="deleteModal" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center z-50 hidden transition-opacity duration-300 ease-in-out opacity-0">
        <div class="bg-white rounded-xl shadow-2xl p-8 max-w-sm w-full transform -translate-y-4 scale-95 transition-all duration-300 ease-out">
            <div class="flex flex-col items-center justify-center mb-6">
                <div class="bg-red-100 rounded-full p-3 mb-4">
                    <svg class="h-10 w-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.368 18c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2 text-center">Konfirmasi Hapus Data</h3>
                <p class="text-gray-600 text-center text-lg">
                    Apakah Anda yakin ingin menghapus data santri: <br><strong id="modalSantriName" class="text-red-700"></strong>?
                </p>
                <p class="text-sm text-gray-500 mt-2 text-center">Tindakan ini tidak dapat dibatalkan.</p>
            </div>

            <div class="flex justify-center gap-4 mt-6">
                <button type="button" id="cancelDelete" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-3 px-6 rounded-lg transition duration-200 ease-in-out shadow-md hover:shadow-lg">
                    Batal
                </button>
                <button type="button" id="confirmDelete" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 ease-in-out shadow-md hover:shadow-lg">
                    Hapus Data
                </button>
            </div>
        </div>
    </div>

    <script>
        // Store the form element that needs to be submitted
        let formToSubmit = null;
        let santriNameForModal = '';

        const deleteModal = document.getElementById('deleteModal');
        const modalSantriName = document.getElementById('modalSantriName');
        const confirmDeleteButton = document.getElementById('confirmDelete');
        const cancelDeleteButton = document.getElementById('cancelDelete');

        /**
         * Shows the delete confirmation modal.
         * @param {string} santriId - The ID of the santri to be deleted.
         * @param {string} santriName - The name of the santri to display in the modal.
         */
        function showDeleteModal(santriId, santriName) {
            // Find the corresponding form using the santriId
            formToSubmit = document.getElementById(`delete-form-${santriId}`);
            if (!formToSubmit) {
                console.error(`Form with ID delete-form-${santriId} not found.`);
                return;
            }

            santriNameForModal = santriName; // Store the name
            modalSantriName.textContent = santriNameForModal; // Update modal content

            // Show the modal with transitions
            deleteModal.classList.remove('hidden');
            setTimeout(() => {
                deleteModal.classList.remove('opacity-0');
                deleteModal.querySelector('div').classList.remove('-translate-y-4', 'scale-95');
                deleteModal.querySelector('div').classList.add('translate-y-0', 'scale-100');
            }, 10); // Small delay to allow 'hidden' to be removed before transition starts
        }

        /**
         * Hides the delete confirmation modal.
         */
        function hideDeleteModal() {
            // Hide the modal with transitions
            deleteModal.querySelector('div').classList.add('-translate-y-4', 'scale-95');
            deleteModal.querySelector('div').classList.remove('translate-y-0', 'scale-100');
            deleteModal.classList.add('opacity-0');
            setTimeout(() => {
                deleteModal.classList.add('hidden');
            }, 300); // Wait for transition to complete before adding 'hidden'
        }

        // Event listener for the "Hapus Data" button inside the modal
        confirmDeleteButton.addEventListener('click', () => {
            if (formToSubmit) {
                formToSubmit.submit(); // Submit the stored form
            }
            hideDeleteModal(); // Hide modal regardless
        });

        // Event listener for the "Batal" button inside the modal
        cancelDeleteButton.addEventListener('click', () => {
            hideDeleteModal();
        });

        // Event listener for clicking outside the modal content to close it
        deleteModal.addEventListener('click', (event) => {
            // If the click is directly on the overlay (not the modal content itself)
            if (event.target === deleteModal) {
                hideDeleteModal();
            }
        });
    </script>
</x-app-layout>