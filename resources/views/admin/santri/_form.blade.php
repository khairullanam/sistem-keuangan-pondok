<div class="mb-4">
    <label for="nama" class="block text-sm font-semibold text-gray-800 mb-1">Nama</label>
    <input type="text" name="nama" id="nama"
           value="{{ old('nama', $santri->nama) }}"
           class="w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
           required>
    @error('nama')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="nis" class="block text-sm font-semibold text-gray-800 mb-1">NIS</label>
    <input type="text" name="nis" id="nis"
           value="{{ old('nis', $santri->nis) }}"
           class="w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
           required>
    @error('nis')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="alamat" class="block text-sm font-semibold text-gray-800 mb-1">Alamat</label>
    <textarea name="alamat" id="alamat" rows="3"
              class="w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
              required>{{ old('alamat', $santri->alamat) }}</textarea>
    @error('alamat')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="tanggal_lahir" class="block text-sm font-semibold text-gray-800 mb-1">Tanggal Lahir</label>
    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
           value="{{ old('tanggal_lahir', $santri->tanggal_lahir) }}"
           class="w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
           required>
    @error('tanggal_lahir')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="kamar" class="block text-sm font-semibold text-gray-800 mb-1">Kamar</label>
    <input type="text" name="kamar" id="kamar"
           value="{{ old('kamar', $santri->kamar) }}"
           class="w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
           required>
    @error('kamar')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="bendahara_id" class="block text-sm font-semibold text-gray-800 mb-1">Bendahara</label>
    <input type="text" name="bendahara_id" id="bendahara_id"
           value="1"
           readonly
           class="w-full border border-gray-300 bg-gray-100 rounded-lg px-4 py-2 shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out cursor-not-allowed"
           required>
    @error('bendahara_id')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>