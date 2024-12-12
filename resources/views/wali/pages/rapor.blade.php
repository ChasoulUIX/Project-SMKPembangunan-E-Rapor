@extends('wali.layouts.app')

@section('content')
<div class="bg-white rounded-2xl shadow-xl p-4 sm:p-6 lg:p-8 max-w-full">
    <div class="border-b border-gray-100 pb-4 sm:pb-6 mb-4 sm:mb-6">
        <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Cetak Rapor Siswa</h1>
        <p class="text-xs sm:text-sm lg:text-base text-gray-500 mt-2">Pilih siswa untuk mencetak rapor</p>
    </div>

    <!-- Filter dan Pencarian -->
    <div class="mb-6 sm:mb-8">
        <div class="space-y-2">
            <label class="block text-xs sm:text-sm font-medium text-gray-700">Cari Siswa</label>
            <div class="relative">
                <input type="text" 
                    id="searchInput" 
                    placeholder="Cari berdasarkan NIS atau nama siswa..." 
                    class="w-full rounded-xl border-gray-200 bg-gray-50 py-2 sm:py-3 pl-8 sm:pl-10 pr-3 sm:pr-4 text-xs sm:text-sm focus:border-blue-500 focus:ring-blue-500">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 sm:pl-4">
                    <svg class="h-3 w-3 sm:h-4 sm:w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Siswa -->
    <div class="overflow-x-auto rounded-xl border border-gray-100 bg-white">
        <table class="min-w-full divide-y divide-gray-100">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">No</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">NIS</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Nama Siswa</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Kelas</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Jurusan</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Nilai Rapor</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @php
                    $daftarSiswa = App\Models\Daftarsiswa::where('nip', Auth::user()->nip)->get();
                    $no = 1;
                @endphp
                @forelse($daftarSiswa as $siswa)
                    @foreach($siswa->daftar_siswa as $murid)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-500">{{ $no++ }}</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm font-medium text-gray-900">{{ $murid['nis'] }}</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $murid['name'] }}</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $siswa->nama_kelas }}</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $siswa->jurusan }}</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                            @php
                                $nilaiRapor = \App\Models\Nilaisiswa::where('nis', $murid['nis'])
                                    ->avg('nilai_rapor');
                            @endphp
                            {{ number_format($nilaiRapor, 1) }}
                        </td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm font-medium space-x-1 sm:space-x-2">
                            <a href="{{ route('wali.rapor.detail', ['nis' => $murid['nis']]) }}" class="px-2 sm:px-3 py-1 sm:py-1.5 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors">Cetak Rapor</a>
                        </td>
                    </tr>
                    @endforeach
                @empty
                    <tr>
                        <td colspan="6" class="px-3 sm:px-6 py-3 sm:py-4 text-center text-sm text-gray-500">
                            Tidak ada data siswa
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 sm:mt-8 flex flex-col sm:flex-row items-center justify-between space-y-3 sm:space-y-0">
        <div class="text-xs sm:text-sm text-gray-600">
            Menampilkan <span class="font-medium">1 - {{ $daftarSiswa->count() }}</span> dari <span class="font-medium">{{ $daftarSiswa->count() }}</span> siswa
        </div>
        <div class="flex space-x-2">
            <button class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm font-medium text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors flex items-center space-x-1 sm:space-x-2">
                <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span>Previous</span>
            </button>
            <button class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm font-medium text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors flex items-center space-x-1 sm:space-x-2">
                <span>Next</span>
                <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const tableRows = document.querySelectorAll('tbody tr');

    searchInput.addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();

        tableRows.forEach(row => {
            if (row.querySelector('td[colspan]')) return; // Skip empty state row

            const nis = row.children[1].textContent.toLowerCase();
            const name = row.children[2].textContent.toLowerCase();

            if (nis.includes(searchTerm) || name.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});
</script>
@endsection
