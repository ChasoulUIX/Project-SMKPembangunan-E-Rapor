@extends('wali.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
    <div class="border-b pb-4 mb-4">
        <h1 class="text-xl sm:text-2xl font-bold text-gray-800">Dashboard Wali Kelas</h1>
        <p class="text-sm sm:text-base text-gray-600">Selamat datang di sistem E-Rapor SMK Pembangunan Bogor</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
        <!-- Card Kelas dan Tahun Ajaran -->
        <div class="bg-blue-50 rounded-xl p-4 sm:p-6 shadow-md">
            <div class="flex items-center justify-between mb-4">
                <div class="p-2 sm:p-3 bg-blue-100 rounded-lg">
                    <svg class="w-6 h-6 sm:w-8 sm:h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div class="text-right">
                    @php
                        $daftarSiswa = \App\Models\Daftarsiswa::where('nip', Auth::user()->nip)->first();
                        $namaKelas = $daftarSiswa ? $daftarSiswa->nama_kelas : 'Belum ditentukan';
                    @endphp
                    <span class="text-2xl sm:text-3xl font-bold text-blue-600">{{ $namaKelas }}</span>
                    <p class="text-xs sm:text-sm text-blue-500 mt-1">2023/2024</p>
                </div>
            </div>
            <h3 class="text-base sm:text-lg font-semibold text-gray-800">Kelas yang Diampu</h3>
            <p class="text-sm text-gray-600 mt-1">Semester Ganjil</p>
        </div>

        <!-- Card Jumlah Siswa -->
        <div class="bg-green-50 rounded-xl p-4 sm:p-6 shadow-md">
            <div class="flex items-center justify-between mb-4">
                <div class="p-2 sm:p-3 bg-green-100 rounded-lg">
                    <svg class="w-6 h-6 sm:w-8 sm:h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    @php
                        use App\Models\Daftarsiswa;
                        $daftarSiswa = Daftarsiswa::where('nip', Auth::user()->nip)->first();
                        $totalSiswa = 0;
                        
                        if($daftarSiswa && is_array($daftarSiswa->daftar_siswa)) {
                            $totalSiswa = count($daftarSiswa->daftar_siswa);
                        }
                    @endphp
                    <span class="text-2xl sm:text-3xl font-bold text-green-600">{{ $totalSiswa }}</span>
                    <p class="text-xs sm:text-sm text-green-500 mt-1">Siswa</p>
                </div>
            </div>
            <h3 class="text-base sm:text-lg font-semibold text-gray-800">Jumlah Siswa</h3>
            <p class="text-sm text-gray-600 mt-1">Total Siswa: {{ $totalSiswa }}</p>
        </div>

        <!-- Card Mata Pelajaran -->
        <div class="bg-purple-50 rounded-xl p-4 sm:p-6 shadow-md">
            <div class="flex items-center justify-between mb-4">
                <div class="p-2 sm:p-3 bg-purple-100 rounded-lg">
                    <svg class="w-6 h-6 sm:w-8 sm:h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div class="text-right">
                    @php
                        $loggedInName = auth()->user()->name;
                        $matapelajarans = \App\Models\Matapelajaran::where('nama_guru', $loggedInName)
                            ->orderBy('nama_mapel')
                            ->get();
                    @endphp
                    <span class="text-2xl sm:text-3xl font-bold text-purple-600">{{ $matapelajarans->count() }}</span>
                    <p class="text-xs sm:text-sm text-purple-500 mt-1">Mata Pelajaran</p>
                </div>
            </div>
            <h3 class="text-base sm:text-lg font-semibold text-gray-800">Mata Pelajaran</h3>
            <p class="text-sm text-gray-600 mt-1">{{ $matapelajarans->pluck('nama_mapel')->implode(', ') ?: '-' }}</p>
        </div>
    </div>

    <!-- Tabel Daftar Siswa -->
    <div class="mt-6 sm:mt-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 space-y-4 sm:space-y-0">
            <h2 class="text-lg sm:text-xl font-semibold text-gray-800">Daftar Siswa</h2>
            <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2 w-full sm:w-auto">
                <a href="{{ route('wali.siswa.index') }}" class="w-full sm:w-auto px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm text-center">
                    Nilai Siswa
                </a>
            </div>
        </div>
        
        <div class="bg-white rounded-lg border overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIS</th>
                        <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NISN</th>
                        <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Siswa</th>
                        <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @php
                        $daftarSiswa = App\Models\Daftarsiswa::where('nip', Auth::user()->nip)->get();
                        $no = 1;
                    @endphp
                    @forelse($daftarSiswa as $siswa)
                        @foreach($siswa->daftar_siswa as $murid)
                        <tr>
                            <td class="px-4 sm:px-6 py-3 whitespace-nowrap text-xs sm:text-sm text-gray-500">{{ $no++ }}</td>
                            <td class="px-4 sm:px-6 py-3 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $murid['nis'] }}</td>
                            <td class="px-4 sm:px-6 py-3 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $murid['nisn'] }}</td>
                            <td class="px-4 sm:px-6 py-3 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $murid['name'] }}</td>
                            <td class="px-4 sm:px-6 py-3 whitespace-nowrap">
                                <div class="flex flex-col">
                                    <span class="text-xs text-gray-900">{{ $siswa->nama_kelas }}</span>
                                    <span class="text-xs text-gray-500">{{ $siswa->jurusan }}</span>
                                </div>
                            </td>
                           
                        </tr>
                        @endforeach
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 sm:px-6 py-3 whitespace-nowrap text-sm text-center text-gray-500">
                                Tidak ada data siswa
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
</div>
@endsection
