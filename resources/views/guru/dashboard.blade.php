@extends('guru.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
    <div class="border-b pb-4 mb-4">
        <h1 class="text-xl sm:text-2xl font-bold text-gray-800">Dashboard Guru</h1>
        <p class="text-sm sm:text-base text-gray-600">Selamat datang di sistem E-Rapor SMK Pembangunan Bogor</p>
    </div>

    <!-- Filter Section -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <div>
            <label for="kelas" class="block text-sm font-medium text-gray-700 mb-1">Pilih Kelas</label>
            <select id="kelas" name="kelas" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                <option value="">Pilih Kelas</option>
                @foreach(\App\Models\Daftarmatapelajaran::where('nama_guru', Auth::user()->name)->select('nama_kelas')->distinct()->orderBy('nama_kelas')->get() as $kelas)
                    <option value="{{ $kelas->nama_kelas }}">{{ $kelas->nama_kelas }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="mapel" class="block text-sm font-medium text-gray-700 mb-1">Mata Pelajaran</label>
            <select id="mapel" name="mapel" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                <option value="">Pilih Mata Pelajaran</option>
                @foreach(\App\Models\Daftarmatapelajaran::where('nama_guru', Auth::user()->name)->select('nama_mapel')->distinct()->orderBy('nama_mapel')->get() as $mapel)
                    <option value="{{ $mapel->nama_mapel }}">{{ $mapel->nama_mapel }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="tahun_ajaran" class="block text-sm font-medium text-gray-700 mb-1">Tahun Ajaran</label>
            <select id="tahun_ajaran" name="tahun_ajaran" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                <option value="2023/2024">2023/2024 - Semester Ganjil</option>
                <option value="2023/2024">2023/2024 - Semester Genap</option>
            </select>
        </div>
    </div>

    <!-- Info Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <div class="bg-blue-50 rounded-xl p-4 shadow-md">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Total Kelas</p>
                    <p class="text-xl font-bold text-gray-800">{{ \App\Models\Daftarmatapelajaran::where('nama_guru', Auth::user()->name)->select('nama_kelas')->distinct()->count() }} Kelas</p>
                </div>
            </div>
        </div>

        <div class="bg-green-50 rounded-xl p-4 shadow-md">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-green-100 rounded-lg">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Mata Pelajaran</p>
                    <p class="text-xl font-bold text-gray-800">{{ \App\Models\Daftarmatapelajaran::where('nama_guru', Auth::user()->name)->select('nama_mapel')->distinct()->count() }} Mapel</p>
                </div>
            </div>
        </div>

        <div class="bg-purple-50 rounded-xl p-4 shadow-md">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-purple-100 rounded-lg">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Total Siswa</p>
                    @php
                        $totalSiswa = 0;
                        $daftarMapel = \App\Models\Daftarmatapelajaran::where('nama_guru', Auth::user()->name)->get();
                        foreach($daftarMapel as $mapel) {
                            $daftarSiswa = \App\Models\Daftarsiswa::where('id_kelas', $mapel->id_kelas)->first();
                            if($daftarSiswa && $daftarSiswa->daftar_siswa) {
                                $siswaArray = is_string($daftarSiswa->daftar_siswa) ? 
                                    json_decode($daftarSiswa->daftar_siswa, true) : 
                                    $daftarSiswa->daftar_siswa;
                                $totalSiswa += count($siswaArray);
                            }
                        }
                    @endphp
                    <p class="text-xl font-bold text-gray-800">{{ $totalSiswa }} Siswa</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Siswa -->
    <!-- Tabel Nilai -->
    <div class="overflow-x-auto rounded-xl border border-gray-100 bg-white">
        <table class="min-w-full divide-y divide-gray-100">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">No</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">NIS</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Nama Siswa</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Nama Guru</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Mata Pelajaran</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">UTS</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">UAS</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
            @php
                $nilaiSiswa = \App\Models\Nilaisiswa::where('nama_guru', Auth::user()->name)->get();
                $no = 1;
            @endphp
            @forelse($nilaiSiswa as $nilai)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-500">{{ $no++ }}</td>
                    <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $nilai->nis }}</td>
                    <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $nilai->nama_siswa }}</td>
                    <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $nilai->nama_guru }}</td>
                    <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $nilai->nama_mapel }}</td>
                    <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $nilai->uts }}</td>
                    <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $nilai->uas }}</td>
                    <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                        <a href="{{ route('wali.nilai.show', $nilai->id) }}" class="text-blue-600 hover:text-blue-900">Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="px-3 sm:px-6 py-3 sm:py-4 text-center text-sm text-gray-500">
                        Tidak ada data nilai
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
