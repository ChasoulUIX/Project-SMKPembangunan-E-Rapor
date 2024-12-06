@extends('guru.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
    <div class="border-b pb-4 mb-4">
        <h1 class="text-xl sm:text-2xl font-bold text-gray-800">Input Nilai Siswa</h1>
        <p class="text-sm sm:text-base text-gray-600">Silahkan pilih kelas dan mata pelajaran untuk menginput nilai</p>
    </div>

    <!-- Filter Section -->
    <div class="mb-6">
        <label for="filter_kelas" class="block text-sm font-medium text-gray-700 mb-2">Filter Kelas:</label>
        <select id="filter_kelas" onchange="filterByKelas(this.value)" class="w-full sm:w-64 px-4 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <option value="">Semua Kelas</option>
            @foreach(\App\Models\Nilaisiswa::where('nama_guru', Auth::user()->name)
                    ->select('nama_kelas')
                    ->distinct()
                    ->orderBy('nama_kelas')
                    ->get() as $kelas)
                <option value="{{ $kelas->nama_kelas }}">{{ $kelas->nama_kelas }}</option>
            @endforeach
        </select>
    </div>

    <!-- Create Button -->
    <div class="mb-4">
        <button onclick="openCreateModal()" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-800 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
            Tambah Nilai
        </button>
    </div>

    <!-- Table Section -->
    <div class="overflow-x-auto rounded-xl border border-gray-100 bg-white">
        <table class="min-w-full divide-y divide-gray-100">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">No</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Nama Kelas</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Nama Siswa</th>
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
                <tr class="hover:bg-gray-50 transition-colors nilai-row" data-kelas="{{ $nilai->nama_kelas }}">
                    <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-500">{{ $no++ }}</td>
                    <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $nilai->nama_kelas }}</td>
                    <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $nilai->nama_siswa }}</td>
                    <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $nilai->nama_mapel }}</td>
                    <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $nilai->uts }}</td>
                    <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $nilai->uas }}</td>
                    <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                        <div class="flex space-x-3">
                            <a href="{{ route('guru.nilai.show', $nilai->id) }}" class="text-blue-600 hover:text-blue-900">Detail</a>
                            <button onclick="openEditModal({{ $nilai->id }})" class="text-green-600 hover:text-green-900">Edit</button>
                            <form action="{{ route('guru.nilai.destroy', $nilai->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                            </form>
                        </div>
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

<!-- Create Modal -->
<div id="createModal" class="fixed inset-0 bg-black bg-opacity-50 hidden overflow-y-auto h-full w-full backdrop-blur-sm transition-all duration-300">
    <div class="relative top-10 mx-auto p-8 border w-[90%] max-w-[1000px] shadow-2xl rounded-xl bg-white transform transition-all duration-300">
        <div class="mt-2">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-gray-800">Tambah Nilai Baru</h3>
                <button onclick="closeCreateModal()" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form action="{{ route('guru.nilai.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Kelas</label>
                            <select name="nama_kelas" id="nama_kelas"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                onchange="updateIdKelas(this)"
                                required>
                                <option value="">Pilih Kelas</option>
                                @foreach(\App\Models\Daftarmatapelajaran::where('nama_guru', Auth::user()->name)
                                    ->select('nama_kelas', 'id_kelas')
                                    ->distinct()
                                    ->orderBy('nama_kelas')
                                    ->get() as $kelas)
                                    <option value="{{ $kelas->nama_kelas }}" data-id="{{ $kelas->id_kelas }}">{{ $kelas->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="id_kelas" id="id_kelas" required>

                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">NIS</label>
                            <input type="number" name="nis" id="nis"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm bg-gray-50"
                                placeholder="NIS akan terisi otomatis"
                                readonly
                                required>
                        </div>

                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Siswa</label>
                            <div class="flex space-x-2">
                                <!-- Combobox dropdown -->
                                <select name="nama_siswa_select" id="nama_siswa_select"
                                    class="w-1/2 px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm">
                                    <option value="">Pilih Siswa</option>
                                    @foreach(\App\Models\Murid::select('name', 'nis')->orderBy('name')->get() as $siswa)
                                        <option value="{{ $siswa->name }}" data-nis="{{ $siswa->nis }}">{{ $siswa->name }}</option>
                                    @endforeach
                                </select>

                                <!-- Search input -->
                                <input type="text" name="nama_siswa" id="nama_siswa"
                                    class="w-1/2 px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                    placeholder="Atau ketik untuk mencari..."
                                    autocomplete="off"
                                    required>
                            </div>
                            <div id="siswaDropdown" class="absolute z-10 w-1/2 right-0 bg-white border border-gray-200 rounded-lg mt-1 max-h-60 overflow-y-auto hidden">
                            </div>
                        </div>

                        <script>
                            const namaSiswaInput = document.getElementById('nama_siswa');
                            const namaSiswaSelect = document.getElementById('nama_siswa_select');
                            const siswaDropdown = document.getElementById('siswaDropdown');
                            const siswaList = @json(\App\Models\Murid::select('name', 'nis')->orderBy('name')->get());
                            const nisInput = document.getElementById('nis');

                            // Handle combobox selection
                            namaSiswaSelect.addEventListener('change', function() {
                                const selectedOption = this.options[this.selectedIndex];
                                if (selectedOption.value) {
                                    namaSiswaInput.value = selectedOption.value;
                                    nisInput.value = selectedOption.dataset.nis;
                                }
                            });

                            // Handle search input
                            namaSiswaInput.addEventListener('input', function() {
                                const searchValue = this.value.toLowerCase();
                                const filteredSiswa = siswaList.filter(siswa => 
                                    siswa.name.toLowerCase().includes(searchValue)
                                );

                                if (searchValue === '') {
                                    siswaDropdown.classList.add('hidden');
                                    return;
                                }

                                siswaDropdown.innerHTML = filteredSiswa
                                    .map(siswa => `
                                        <div class="px-4 py-2 hover:bg-gray-100 cursor-pointer" 
                                             onclick="selectSiswa('${siswa.name}', '${siswa.nis}')">
                                            ${siswa.name}
                                        </div>
                                    `).join('');

                                siswaDropdown.classList.remove('hidden');
                            });

                            function selectSiswa(name, nis) {
                                namaSiswaInput.value = name;
                                nisInput.value = nis;
                                namaSiswaSelect.value = name;
                                siswaDropdown.classList.add('hidden');
                            }

                            // Hide dropdown when clicking outside
                            document.addEventListener('click', function(e) {
                                if (!namaSiswaInput.contains(e.target) && !siswaDropdown.contains(e.target)) {
                                    siswaDropdown.classList.add('hidden');
                                }
                            });
                        </script>

                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Wali Kelas</label>
                            <select name="nama_wali" id="nama_wali"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                required>
                                <option value="">Pilih Wali Kelas</option>
                                @foreach(\App\Models\Kelas::select('wali_kelas')->distinct()->orderBy('wali_kelas')->get() as $wali)
                                    <option value="{{ $wali->wali_kelas }}">{{ $wali->wali_kelas }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Mata Pelajaran</label>
                            <div class="flex space-x-2">
                                <!-- Combobox dropdown -->
                                <select name="nama_mapel_select" id="nama_mapel_select"
                                    class="w-1/2 px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm">
                                    <option value="">Pilih Mata Pelajaran</option>
                                    @foreach(\App\Models\Matapelajaran::select('nama_mapel', 'nama_guru')->where('nama_guru', Auth::user()->name)->orderBy('nama_mapel')->get() as $mapel)
                                        <option value="{{ $mapel->nama_mapel }}">{{ $mapel->nama_mapel }}</option>
                                    @endforeach
                                </select>

                                <!-- Search input -->
                                <input type="text" name="nama_mapel" id="nama_mapel"
                                    class="w-1/2 px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                    placeholder="Atau ketik untuk mencari..."
                                    autocomplete="off"
                                    required>
                            </div>
                            <div id="mapelDropdown" class="absolute z-10 w-1/2 right-0 bg-white border border-gray-200 rounded-lg mt-1 max-h-60 overflow-y-auto hidden">
                            </div>
                        </div>

                        <script>
                            const namaMapelInput = document.getElementById('nama_mapel');
                            const namaMapelSelect = document.getElementById('nama_mapel_select');
                            const mapelDropdown = document.getElementById('mapelDropdown');
                            const mapelList = @json(\App\Models\Matapelajaran::select('nama_mapel', 'nama_guru')->where('nama_guru', Auth::user()->name)->orderBy('nama_mapel')->get());

                            // Handle combobox selection
                            namaMapelSelect.addEventListener('change', function() {
                                const selectedOption = this.options[this.selectedIndex];
                                if (selectedOption.value) {
                                    namaMapelInput.value = selectedOption.value;
                                }
                            });

                            // Handle search input
                            namaMapelInput.addEventListener('input', function() {
                                const searchValue = this.value.toLowerCase();
                                const filteredMapel = mapelList.filter(mapel => 
                                    mapel.nama_mapel.toLowerCase().includes(searchValue)
                                );

                                if (searchValue === '') {
                                    mapelDropdown.classList.add('hidden');
                                    return;
                                }

                                mapelDropdown.innerHTML = filteredMapel
                                    .map(mapel => `
                                        <div class="px-4 py-2 hover:bg-gray-100 cursor-pointer" 
                                             onclick="selectMapel('${mapel.nama_mapel}')">
                                            ${mapel.nama_mapel}
                                        </div>
                                    `).join('');

                                mapelDropdown.classList.remove('hidden');
                            });

                            function selectMapel(nama_mapel) {
                                namaMapelInput.value = nama_mapel;
                                namaMapelSelect.value = nama_mapel;
                                mapelDropdown.classList.add('hidden');
                            }

                            // Hide dropdown when clicking outside
                            document.addEventListener('click', function(e) {
                                if (!namaMapelInput.contains(e.target) && !mapelDropdown.contains(e.target)) {
                                    mapelDropdown.classList.add('hidden');
                                }
                            });
                        </script>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="relative">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Materi 1</label>
                                <input type="text" name="nama_materi_1"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                    placeholder="Masukkan nama materi 1">
                            </div>

                            <div class="relative">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nilai Materi 1</label>
                                <input type="number" name="materi_1" min="0" max="100"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                    placeholder="0-100">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div class="relative">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Materi 2</label>
                                <input type="text" name="nama_materi_2"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                    placeholder="Masukkan nama materi 2">
                            </div>

                            <div class="relative">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nilai Materi 2</label>
                                <input type="number" name="materi_2" min="0" max="100"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                    placeholder="0-100">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div class="relative">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Materi 3</label>
                                <input type="text" name="nama_materi_3"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                    placeholder="Masukkan nama materi 3">
                            </div>

                            <div class="relative">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nilai Materi 3</label>
                                <input type="number" name="materi_3" min="0" max="100"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                    placeholder="0-100">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div class="relative">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Materi 4</label>
                                <input type="text" name="nama_materi_4"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                    placeholder="Masukkan nama materi 4">
                            </div>

                            <div class="relative">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nilai Materi 4</label>
                                <input type="number" name="materi_4" min="0" max="100"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                    placeholder="0-100">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div class="relative">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Materi 5</label>
                                <input type="text" name="nama_materi_5"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                    placeholder="Masukkan nama materi 5">
                            </div>

                            <div class="relative">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nilai Materi 5</label>
                                <input type="number" name="materi_5" min="0" max="100"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                    placeholder="0-100">
                            </div>
                        </div>

                            <div class="relative hidden">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nilai Akhir Materi</label>
                                <input type="number" name="na_materi" min="0" max="100"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                    placeholder="0-100">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div class="relative">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">UTS</label>
                                <input type="number" name="uts" min="0" max="100"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                    placeholder="0-100">
                            </div>

                            <div class="relative">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">UAS</label>
                                <input type="number" name="uas" min="0" max="100"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                    placeholder="0-100">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div class="relative">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Kehadiran</label>
                                <input type="number" name="kehadiran" min="0" max="100"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                    placeholder="0-100">
                            </div>

                            <div class="relative">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Sikap</label>
                                <input type="number" name="sikap" min="0" max="100"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                    placeholder="0-100">
                            </div>
                        </div>

                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nilai Rapor</label>
                            <input type="number" name="nilai_rapor" min="0" max="100"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                placeholder="0-100">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-4 mt-8 pt-4 border-t">
                    <button type="button" onclick="closeCreateModal()" 
                        class="px-6 py-2.5 rounded-lg text-gray-700 bg-gray-100 hover:bg-gray-200 transition duration-200 ease-in-out font-medium text-sm">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-6 py-2.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white transition duration-200 ease-in-out font-medium text-sm">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function updateIdKelas(select) {
        const selectedOption = select.options[select.selectedIndex];
        const idKelas = selectedOption.getAttribute('data-id');
        document.getElementById('id_kelas').value = idKelas || '';
    }

    function updateNIS(select) {
        const selectedOption = select.options[select.selectedIndex];
        const nis = selectedOption.getAttribute('data-nis');
        document.getElementById('nis').value = nis || '';
    }
</script>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Edit Nilai</h3>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-6">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Materi 1</label>
                            <input type="text" name="nama_materi_1" id="edit_nama_materi_1"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                placeholder="Masukkan nama materi 1" value="{{ old('nama_materi_1', $nilai['nama_materi_1'] ?? '') }}">
                        </div>

                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nilai Materi 1</label>
                            <input type="number" name="materi_1" id="edit_materi_1" min="0" max="100"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                placeholder="0-100" value="{{ old('materi_1', $nilai['materi_1'] ?? '') }}">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Materi 2</label>
                            <input type="text" name="nama_materi_2" id="edit_nama_materi_2"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                placeholder="Masukkan nama materi 2" value="{{ old('nama_materi_2', $nilai['nama_materi_2'] ?? '') }}">
                        </div>

                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nilai Materi 2</label>
                            <input type="number" name="materi_2" id="edit_materi_2" min="0" max="100"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                placeholder="0-100" value="{{ old('materi_2', $nilai['materi_2'] ?? '') }}">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Materi 3</label>
                            <input type="text" name="nama_materi_3" id="edit_nama_materi_3"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                placeholder="Masukkan nama materi 3" value="{{ old('nama_materi_3', $nilai['nama_materi_3'] ?? '') }}">
                        </div>

                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nilai Materi 3</label>
                            <input type="number" name="materi_3" id="edit_materi_3" min="0" max="100"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                placeholder="0-100" value="{{ old('materi_3', $nilai['materi_3'] ?? '') }}">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Materi 4</label>
                            <input type="text" name="nama_materi_4" id="edit_nama_materi_4"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                placeholder="Masukkan nama materi 4" value="{{ old('nama_materi_4', $nilai['nama_materi_4'] ?? '') }}">
                        </div>

                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nilai Materi 4</label>
                            <input type="number" name="materi_4" id="edit_materi_4" min="0" max="100"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                placeholder="0-100" value="{{ old('materi_4', $nilai['materi_4'] ?? '') }}">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Materi 5</label>
                            <input type="text" name="nama_materi_5" id="edit_nama_materi_5"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                placeholder="Masukkan nama materi 5" value="{{ old('nama_materi_5', $nilai['nama_materi_5'] ?? '') }}">
                        </div>

                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nilai Materi 5</label>
                            <input type="number" name="materi_5" id="edit_materi_5" min="0" max="100"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                placeholder="0-100" value="{{ old('materi_5', $nilai['materi_5'] ?? '') }}">
                        </div>
                    </div>

                    <div class="relative hidden">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nilai Akhir Materi</label>
                        <input type="number" name="na_materi" id="edit_na_materi" min="0" max="100"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                            placeholder="0-100" value="{{ old('na_materi', $nilai['na_materi'] ?? '') }}">
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">UTS</label>
                            <input type="number" name="uts" id="edit_uts" min="0" max="100"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                placeholder="0-100" value="{{ old('uts', $nilai['uts'] ?? '') }}">
                        </div>

                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">UAS</label>
                            <input type="number" name="uas" id="edit_uas" min="0" max="100"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                placeholder="0-100" value="{{ old('uas', $nilai['uas'] ?? '') }}">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Kehadiran</label>
                            <input type="number" name="kehadiran" id="edit_kehadiran" min="0" max="100"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                placeholder="0-100" value="{{ old('kehadiran', $nilai['kehadiran'] ?? '') }}">
                        </div>

                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Sikap</label>
                            <input type="number" name="sikap" id="edit_sikap" min="0" max="100"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                placeholder="0-100" value="{{ old('sikap', $nilai['sikap'] ?? '') }}">
                        </div>
                    </div>

                    <div class="relative">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nilai Rapor</label>
                        <input type="number" name="nilai_rapor" id="edit_nilai_rapor" min="0" max="100"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                            placeholder="0-100" value="{{ old('nilai_rapor', $nilai['nilai_rapor'] ?? '') }}">
                    </div>
                </div>

                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
        {{ session('success') }}
    </div>
@endif

<script>
function openCreateModal() {
    document.getElementById('createModal').classList.remove('hidden');
}

function closeCreateModal() {
    document.getElementById('createModal').classList.add('hidden');
}

function openEditModal(id) {
    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('editForm').action = `/guru/nilai/${id}`;
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}

function filterByKelas(kelas) {
    const rows = document.querySelectorAll('.nilai-row');
    rows.forEach(row => {
        if (kelas === '' || row.getAttribute('data-kelas') === kelas) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}
</script>

@endsection
