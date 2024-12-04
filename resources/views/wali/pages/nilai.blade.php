@extends('wali.layouts.app')

@section('content')
<div class="bg-white rounded-2xl shadow-xl p-4 sm:p-6 lg:p-8 max-w-full">
    <div class="border-b border-gray-100 pb-4 sm:pb-6 mb-4 sm:mb-6">
        <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Data Nilai Siswa</h1>
        <p class="text-xs sm:text-sm lg:text-base text-gray-500 mt-2">Lihat nilai-nilai siswa kelas X RPL 1</p>
    </div>

    <!-- Filter dan Pencarian -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 mb-6 sm:mb-8">
        <div class="space-y-2">
            <label class="block text-xs sm:text-sm font-medium text-gray-700">Mata Pelajaran</label>
            <div class="relative">
                <select class="w-full rounded-xl border-gray-200 bg-gray-50 py-2 sm:py-3 pl-3 sm:pl-4 pr-8 sm:pr-10 text-xs sm:text-sm focus:border-blue-500 focus:ring-blue-500 appearance-none">
                    <option value="">Semua Mata Pelajaran</option>
                    <option value="matematika">Matematika</option>
                    <option value="bahasa_indonesia">Bahasa Indonesia</option>
                    <option value="bahasa_inggris">Bahasa Inggris</option>
                    <!-- Tambahkan mata pelajaran lainnya -->
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 sm:px-4">
                    <svg class="h-3 w-3 sm:h-4 sm:w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="space-y-2">
            <label class="block text-xs sm:text-sm font-medium text-gray-700">Cari Siswa</label>
            <div class="relative">
                <input type="text" placeholder="Cari nama siswa..." 
                    class="w-full rounded-xl border-gray-200 bg-gray-50 py-2 sm:py-3 pl-8 sm:pl-10 pr-3 sm:pr-4 text-xs sm:text-sm focus:border-blue-500 focus:ring-blue-500">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 sm:pl-4">
                    <svg class="h-3 w-3 sm:h-4 sm:w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Nilai -->
    <div class="overflow-x-auto rounded-xl border border-gray-100 bg-white">
        <table class="min-w-full divide-y divide-gray-100">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">No</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Nama Siswa</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Mata Pelajaran</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Nilai Tugas</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Nilai UTS</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Nilai UAS</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Nilai Akhir</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
            @php
                $daftarNilai = \App\Models\Daftarnilai::where('id_wali', auth()->user()->nip)
                    ->paginate(10);
            @endphp
            @forelse($daftarNilai as $nilai)
                @if(is_array($nilai->daftar_siswa) || is_object($nilai->daftar_siswa))
                    @foreach($nilai->daftar_siswa as $murid)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-500">{{ $loop->parent->index * count($nilai->daftar_siswa) + $loop->iteration }}</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $murid['name'] }}</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $nilai->nama_pelajaran }}</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                            {{ number_format($nilai->calculateAverageScore($murid['nis']), 1) }}
                        </td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $nilai->uts[$murid['nis']] ?? '-' }}</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $nilai->uas[$murid['nis']] ?? '-' }}</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm font-medium text-blue-600">
                            {{ number_format($nilai->calculateFinalScore($murid['nis']), 1) }}
                        </td>
                    </tr>
                    @endforeach
                @endif
            @empty
                <tr>
                    <td colspan="7" class="px-3 sm:px-6 py-3 sm:py-4 text-center text-sm text-gray-500">
                        Tidak ada data nilai
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4 sm:mt-6 flex flex-col sm:flex-row items-center justify-between space-y-3 sm:space-y-0">
        {{ $daftarNilai->links() }}
    </div>
</div>
@endsection
