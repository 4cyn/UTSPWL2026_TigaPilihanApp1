<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Log Barang') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="flex justify-start mb-4">
            <a href="{{ route('barang.index') }}" 
               class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                Kembali
            </a>
        </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                    <h3 class="text-lg font-bold">Riwayat Aktivitas Barang</h3>

                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-300">
                        <thead class="bg-gray-100">
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