@extends('wali.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
    <div class="border-b pb-4 mb-4">
        <h1 class="text-xl sm:text-2xl font-bold text-gray-800">Manajemen Mata Pelajaran</h1>
        <p class="text-sm sm:text-base text-gray-600">Kelola data mata pelajaran</p>
    </div>

    <!-- Search & Add Button -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-4 space-y-3 sm:space-y-0">
        <div class="relative w-full sm:w-64">
            <input type="text" class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-blue-500" placeholder="Cari mata pelajaran...">
            <div class="absolute left-3 top-2.5">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>
        <button onclick="openCreateModal()" class="w-full sm:w-auto px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            <span>Tambah Mata Pelajaran</span>
        </button>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto rounded-xl border border-gray-100 bg-white">
        <table class="min-w-full divide-y divide-gray-100">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">No</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Kode Mapel</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Nama Mapel</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Guru Pengajar</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @php
                    $daftarmatapelajarans = \App\Models\Daftarmatapelajaran::where('nama_wali', Auth::user()->name)->get();
                @endphp
                @forelse($daftarmatapelajarans as $mapel)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-500">{{ $loop->iteration }}</td>
                    <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $mapel->id_kelas }}</td>
                    <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $mapel->nama_mapel }}</td>
                    <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $mapel->nama_guru }}</td>
                    <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm font-medium space-x-2">
                        <button onclick="openEditModal({{ $mapel->id }}, '{{ $mapel->id_kelas }}', '{{ $mapel->nama_mapel }}')" class="text-blue-600 hover:text-blue-900">Edit</button>
                        <form action="{{ route('wali.matapelajaran.destroy', $mapel->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus mata pelajaran ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-3 sm:px-6 py-3 sm:py-4 text-center text-sm text-gray-500">
                        Tidak ada data mata pelajaran
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4 sm:mt-6 flex flex-col sm:flex-row items-center justify-between space-y-3 sm:space-y-0">
        <div class="text-xs sm:text-sm text-gray-600">
            Menampilkan <span class="font-medium">1 - 10</span> dari <span class="font-medium">20</span> mata pelajaran
        </div>
        <div class="flex space-x-2">
            <button class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm font-medium text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors flex items-center space-x-1 sm:space-x-2">
                <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                <span>Previous</span>
            </button>
            <button class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm font-medium text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors flex items-center space-x-1 sm:space-x-2">
                <span>Next</span>
                <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
    </div>
</div>

<!-- Create Modal -->
<div id="createModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
        
        <!-- Modal Content -->
        <div class="relative bg-white rounded-2xl max-w-lg w-full shadow-xl transform transition-all">
            <div class="p-8">
                <!-- Header -->
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Tambah Mata Pelajaran</h3>
                
                <form action="{{ route('wali.matapelajaran.store') }}" method="POST">
                    @csrf
                    <div class="space-y-6">
                        <!-- ID Kelas -->
                        @php
                            $kelas = \App\Models\Kelas::where('wali_kelas', Auth::user()->name)->first();
                        @endphp
                        <input type="hidden" name="id_kelas" id="id_kelas" 
                            value="{{ $kelas->id }}"
                            required>

                        <!-- Nama Kelas -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Kelas</label>
                            <input type="text" name="nama_kelas" id="nama_kelas" 
                                value="{{ $kelas->nama_kelas }}"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors bg-gray-100"
                                readonly required>
                        </div>

                        <!-- Nama Wali -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Wali</label>
                            <input type="text" name="nama_wali" id="nama_wali" value="{{ Auth::user()->name }}"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors bg-gray-100" 
                                readonly required>
                        </div>

                        <!-- Jurusan -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Jurusan</label>
                            <input type="text" name="jurusan" id="jurusan" 
                                value="{{ $kelas->jurusan }}"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors bg-gray-100"
                                readonly required>
                        </div>

                        <!-- Nama Guru -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Guru</label>
                            <input type="text" name="nama_guru" id="nama_guru"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                required>
                        </div>

                        <!-- Nama Mapel -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Mapel</label>
                            <select name="nama_mapel" id="nama_mapel" onchange="updateGuruName()" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" required>
                                <option value="">Pilih Mata Pelajaran</option>
                                @foreach(\App\Models\Matapelajaran::select('nama_mapel', 'nama_guru')->distinct()->orderBy('nama_mapel')->get() as $mapel)
                                    <option value="{{ $mapel->nama_mapel }}" data-guru="{{ $mapel->nama_guru }}">{{ $mapel->nama_mapel }}</option>
                                @endforeach
                            </select>
                        </div>

                        <script>
                            function updateGuruName() {
                                const mapelSelect = document.getElementById('nama_mapel');
                                const guruInput = document.getElementById('nama_guru');
                                const selectedOption = mapelSelect.options[mapelSelect.selectedIndex];
                                guruInput.value = selectedOption.dataset.guru || '';
                            }
                        </script>

                        <!-- Daftar Siswa -->
                        @php
                            $daftarSiswa = \App\Models\Daftarsiswa::where('wali_kelas', Auth::user()->name)->first();
                            $siswaArray = [];
                            if ($daftarSiswa && $daftarSiswa->daftar_siswa) {
                                $siswaArray = is_string($daftarSiswa->daftar_siswa) ? 
                                    json_decode($daftarSiswa->daftar_siswa, true) : 
                                    $daftarSiswa->daftar_siswa;
                            }
                        @endphp
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Daftar Siswa</label>
                            <select name="daftar_siswa[]" id="daftar_siswa" multiple
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                required>
                                @foreach($siswaArray as $namaSiswa)
                                    @if(is_string($namaSiswa))
                                        <option value="{{ $namaSiswa }}" selected>{{ $namaSiswa }}</option>
                                    @elseif(is_array($namaSiswa))
                                        <option value="{{ json_encode($namaSiswa) }}" selected>{{ json_encode($namaSiswa) }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Footer Buttons -->
                    <div class="mt-8 flex justify-end space-x-4">
                        <button type="button" onclick="closeCreateModal()" 
                            class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-white border-2 border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 focus:outline-none transition-colors">
                            Batal
                        </button>
                        <button type="submit" 
                            class="px-6 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none transition-colors">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="relative bg-white rounded-lg max-w-lg w-full">
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Edit Mata Pelajaran</h3>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kode Mapel</label>
                            <input type="text" name="kode_mapel" id="editKodeMapel" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Mapel</label>
                            <input type="text" name="nama_mapel" id="editNamaMapel" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <input type="hidden" name="nama_guru" value="{{ auth()->user()->name }}">
                    </div>
                    <div class="mt-6 flex justify-end space-x-3">
                        <button type="button" onclick="closeEditModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">Batal</button>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function openCreateModal() {
    document.getElementById('createModal').classList.remove('hidden');
}

function closeCreateModal() {
    document.getElementById('createModal').classList.add('hidden');
}

function openEditModal(id, kodeMapel, namaMapel) {
    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('editForm').action = `/wali/matapelajaran/${id}`;
    document.getElementById('editKodeMapel').value = kodeMapel;
    document.getElementById('editNamaMapel').value = namaMapel;
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}
</script>
@endsection
