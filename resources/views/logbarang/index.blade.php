<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Barang') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="flex justify-start mb-4">
            <a href="{{ route('barang.index') }}" 
               class="px-4 py-2 bg-[#fd593d] text-white rounded hover:bg-[#fe914d]">
                Kembali
            </a>
        </div>
        
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="bg-white flex justify-between items-center mb-4">
                
                    <h3 class="text-lg font-bold">Riwayat Aktivitas Barang</h3>

                    <div class="flex gap-2">

                        <details class="relative">
                            <summary class="list-none cursor-pointer px-4 py-2 text-gray-800 rounded hover:bg-[#fff2cc] focus:bg-[#feaf52] flex items-center gap-2">
    
                                <img src="{{ asset('images/filter-setting-icon.png') }}" 
                                    alt="Filter" 
                                    class="w-5 h-5">

                                <span>Filter</span>

                            </summary>

                            <div class="absolute right-0 mt-2 w-72 bg-white border shadow-lg rounded p-4 z-10">
                                <form method="GET" action="{{ route('logbarang.index') }}" class="space-y-3">
                                    <div>
                                        <label class="block text-sm font-medium mb-1">Aksi</label>
                                        <select name="aksi" class="w-full border rounded px-3 py-2">
                                            <option value="">Semua</option>
                                            <option value="Tambah Barang" {{ request('aksi') == 'Tambah Barang' ? 'selected' : '' }}>Tambah</option>
                                            <option value="Update Barang" {{ request('aksi') == 'Update Barang' ? 'selected' : '' }}>Update</option>
                                            <option value="Hapus Barang" {{ request('aksi') == 'Hapus Barang' ? 'selected' : '' }}>Hapus</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium mb-1">Kategori</label>
                                        <input type="text" name="kategori" value="{{ request('kategori') }}" 
                                            class="w-full border rounded px-3 py-2" placeholder="contoh: Sembako">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium mb-1">Tanggal Awal</label>
                                        <input type="date" name="tanggal_awal" value="{{ request('tanggal_awal') }}" 
                                            class="w-full border rounded px-3 py-2">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium mb-1">Tanggal Akhir</label>
                                        <input type="date" name="tanggal_akhir" value="{{ request('tanggal_akhir') }}" 
                                            class="w-full border rounded px-3 py-2">
                                    </div>

                                    <div class="flex gap-2">
                                        <button type="submit" class="px-4 py-2 bg-[#fd593d] text-white rounded">
                                            Filter
                                        </button>
                                        <a href="{{ route('logbarang.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded">
                                            Reset
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </details>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-300">
                        <thead class="bg-[#feaf52]">
                            <tr>
                                <th class="border px-4 py-2 text-left">No</th>
                                <th class="border px-4 py-2 text-left">Nama Barang</th>
                                <th class="border px-4 py-2 text-left">Kategori</th>
                                <th class="border px-4 py-2 text-left">Deskripsi</th>
                                <th class="border px-4 py-2 text-left">Aksi</th>
                                <th class="border px-4 py-2 text-left">Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($logs as $key => $log)
                                <tr class="hover:bg-gray-50">
                                    <td class="border px-4 py-2">{{ $key + 1 }}</td>
                                    <td class="border px-4 py-2">{{ $log->nama_barang }}</td>
                                    <td class="border px-4 py-2">{{ $log->kategori }}</td>
                                    <td class="border px-4 py-2">{{ $log->deskripsi }}</td>

                                    <td class="border px-4 py-2">
                                        @if(str_contains($log->aksi, 'Tambah'))
                                            <span class="text-green-600 font-semibold">{{ $log->aksi }}</span>
                                        @elseif(str_contains($log->aksi, 'Update'))
                                            <span class="text-blue-600 font-semibold">{{ $log->aksi }}</span>
                                        @elseif(str_contains($log->aksi, 'Hapus'))
                                            <span class="text-red-600 font-semibold">{{ $log->aksi }}</span>
                                        @else
                                            {{ $log->aksi }}
                                        @endif
                                    </td>

                                    <td class="border px-4 py-2">
                                        {{ $log->created_at->format('d-m-Y H:i') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="border px-4 py-2 text-center">
                                        Belum ada log aktivitas.
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