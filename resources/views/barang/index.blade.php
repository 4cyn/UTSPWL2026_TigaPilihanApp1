<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Barang') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
        <div class="flex justify-start mb-4">
            <a href="{{ route('logbarang.index') }}"
            class="px-4 py-2 bg-[#fd593d] text-white rounded hover:bg-[#fe914d]">
            Log Book
            </a>
        </div>

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">Data Barang</h3>
                    <a href="{{ route('barang.create') }}"
                       class="px-4 py-2 bg-[#fe914d] text-white rounded hover:bg-[#fd593d]">
                        Tambah Barang
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-300">
                        <thead class="bg-[#feaf52]">
                            <tr>
                                <th class="border px-4 py-2 text-left">No</th>
                                <th class="border px-4 py-2 text-left">Nama</th>
                                <th class="border px-4 py-2 text-left">Kategori</th>
                                <th class="border px-4 py-2 text-left">Deskripsi</th>
                                <th class="border px-4 py-2 text-left">Stok</th>
                                <th class="border px-4 py-2 text-left">Harga</th>
                                <th class="border px-4 py-2 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($barangs as $index => $barang)
                                <tr>
                                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="border px-4 py-2">{{ $barang->nama_barang }}</td>
                                    <td class="border px-4 py-2">{{ $barang->kategori }}</td>
                                    <td class="border px-4 py-2">{{ $barang->deskripsi }}</td>
                                    <td class="border px-4 py-2">{{ $barang->stok }}</td>
                                    <td class="border px-4 py-2">
                                        Rp {{ number_format($barang->harga, 0, ',', '.') }}
                                    </td>
                                    <td class="border px-4 py-2">
                                        <div class="flex gap-3">
                                        <a href="{{ route('barang.edit', $barang->id) }}" 
                                            class="px-5 py-1 bg-[#ffbc28] text-white rounded">
                                            Edit
                                        </a>

                                        <form action="{{ route('barang.destroy', $barang->id) }}" 
                                            method="POST"
                                            class="inline"
                                            onsubmit="return confirm('Yakin hapus barang ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                class="px-5 py-1 bg-[#ff4336] text-white rounded">
                                                Hapus
                                            </button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border px-4 py-2 text-center">
                                        Data barang belum ada.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>