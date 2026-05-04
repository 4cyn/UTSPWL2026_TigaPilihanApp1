<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
        <div class="flex justify-start mb-4">
            <a href="{{ route('users.index') }}" 
               class="px-4 py-2 bg-[#fd593d] text-white rounded hover:bg-[#fe914d]">
                Kembali
            </a>
        </div>

            <div class="bg-white overflow-visible shadow-sm sm:rounded-lg p-6">
                 <div class="bg-white flex justify-between items-center mb-4">
                    
                    <h3 class="text-lg font-bold">Riwayat Aktivitas Pengguna</h3>

                    <div class="flex gap-2">
                        
                        <details class="relative">
                            <summary class="list-none cursor-pointer px-4 py-2 text-gray-800 rounded hover:bg-[#fff2cc] flex items-center gap-2">
                                
                                <img src="{{ asset('images/filter-setting-icon.png') }}" 
                                    alt="Filter" 
                                    class="w-5 h-5">    
                                
                                <span>Filter</span>

                            </summary>

                            <div class="absolute right-0 mt-2 w-72 bg-white border shadow-lg rounded p-4 z-10">
                                <form method="GET" action="{{ route('loguser.index') }}" class="space-y-3">

                                    <div>
                                        <label class="block text-sm font-medium mb-1">Aksi</label>
                                        <select name="aksi" class="w-full border rounded px-3 py-2">
                                            <option value="">Semua</option>
                                            <option value="Tambah User" {{ request('aksi') == 'Tambah User' ? 'selected' : '' }}>Tambah</option>
                                            <option value="Update User" {{ request('aksi') == 'Update User' ? 'selected' : '' }}>Update</option>
                                            <option value="Hapus User" {{ request('aksi') == 'Hapus User' ? 'selected' : '' }}>Hapus</option>
                                            <option value="Login User" {{ request('aksi') == 'Login User' ? 'selected' : '' }}>Login </option>
                                            <option value="Logout User" {{ request('aksi') == 'Logout User' ? 'selected' : '' }}>Logout </option>
                                        </select>
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
                                        <a href="{{ route('loguser.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded">
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
                                <th class="border px-4 py-2 text-left">Nama</th>
                                <th class="border px-4 py-2 text-left">Email</th>
                                <th class="border px-4 py-2 text-left">Aksi</th>
                                <th class="border px-4 py-2 text-left">Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($logs as $key => $log)
                                <tr class="hover:bg-gray-50">
                                    <td class="border px-4 py-2">{{ $key + 1 }}</td>
                                    <td class="border px-4 py-2">{{ $log->name }}</td>
                                    <td class="border px-4 py-2">{{ $log->email }}</td>

                                    <td class="border px-4 py-2">
                                        @if(str_contains($log->aksi, 'Tambah'))
                                            <span class="text-green-600 font-semibold">{{ $log->aksi }}</span>
                                        @elseif(str_contains($log->aksi, 'Update'))
                                            <span class="text-blue-600 font-semibold">{{ $log->aksi }}</span>
                                        @elseif(str_contains($log->aksi, 'Hapus'))
                                            <span class="text-red-600 font-semibold">{{ $log->aksi }}</span>
                                        @elseif(str_contains($log->aksi, 'Login'))
                                            <span class="text-[#ff941d] font-semibold">{{ $log->aksi }}</span>
                                        @elseif(str_contains($log->aksi, 'Logout'))
                                            <span class="text-gray-600 font-semibold">{{ $log->aksi }}</span>
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
                                    <td colspan="5" class="border px-4 py-2 text-center">
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