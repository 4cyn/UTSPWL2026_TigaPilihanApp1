<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Barang') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('barang.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Nama Barang</label>
                        <input type="text" name="nama_barang" value="{{ old('nama_barang') }}" 
                               class="w-full border rounded px-3 py-2">
                        @error('nama_barang')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Kategori</label>
                        <input type="text" name="kategori" value="{{ old('kategori') }}" 
                               class="w-full border rounded px-3 py-2">
                        @error('kategori')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Stok</label>
                        <input type="number" name="stok" value="{{ old('stok') }}" 
                               class="w-full border rounded px-3 py-2">
                        @error('stok')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Harga</label>
                        <input type="number" name="harga" value="{{ old('harga') }}" 
                               class="w-full border rounded px-3 py-2">
                        @error('harga')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Deskripsi</label>
                        <textarea name="deskripsi" 
                                  class="w-full border rounded px-3 py-2">{{ old('deskripsi') }}</textarea>
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" 
                                class="px-4 py-2 bg-[#fd593d] text-white rounded hover:bg-[#feaf52]">
                            Simpan
                        </button>

                        <a href="{{ route('barang.index') }}" 
                           class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-600">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>