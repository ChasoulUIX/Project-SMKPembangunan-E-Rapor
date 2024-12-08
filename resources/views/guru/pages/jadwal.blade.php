@extends('guru.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
    <div class="border-b pb-4 mb-4">
        <h1 class="text-xl sm:text-2xl font-bold text-gray-800">Daftar Kelas Mengajar</h1>
        <p class="text-sm sm:text-base text-gray-600">Kelas yang diampu oleh {{ Auth::user()->nama }}</p>
    </div>

    <!-- Filter Section -->
    

    <!-- Class Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse(\App\Models\Daftarmatapelajaran::where('nama_guru', Auth::user()->name)->get() as $mapel)
        <div class="bg-white border rounded-lg shadow-sm hover:shadow-md transition-shadow">
            <div class="p-4">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-lg font-semibold text-gray-900">{{ $mapel->nama_mapel }}</h3>
                    <span class="px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">
                        {{ $mapel->kelas->nama_kelas }}
                    </span>
                </div>
                <div class="space-y-2">
                    <div class="flex items-center text-sm text-gray-600">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        {{ is_array($mapel->daftar_siswa) ? count($mapel->daftar_siswa) : count(json_decode($mapel->daftar_siswa ?? '[]')) }} Siswa
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        {{ $mapel->kelas->jurusan }}
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('guru.nilai.index', $mapel->id) }}" class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-8">
            <p class="text-gray-500">Tidak ada jadwal mengajar yang tersedia.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
