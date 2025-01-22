@extends('wali.layouts.app')

@section('content')
<div class="bg-white rounded-2xl shadow-xl p-4 sm:p-6 lg:p-8 max-w-full">
    <div class="border-b border-gray-100 pb-4 sm:pb-6 mb-4 sm:mb-6">
        <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Manajemen Data Siswa</h1>
          </div>

    <!-- Filter dan Pencarian -->
    <div class="grid grid-cols-1 sm:grid-cols-1 gap-4 sm:gap-6 mb-6 sm:mb-8">
        <div class="space-y-2">
            <label class="block text-xs sm:text-sm font-medium text-gray-700">Status Siswa</label>
           
        </div>
        <div class="space-y-2">
            <label class="block text-xs sm:text-sm font-medium text-gray-700">Cari Siswa</label>
            <div class="relative">
                <input type="text" id="searchInput" placeholder="Cari nama, NIS, atau NISN..." 
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
                </tr>
            </thead>
           <tbody class="divide-y divide-gray-100">
            @php
                use Illuminate\Support\Facades\Auth;
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
    <div class="mt-4 sm:mt-6 flex flex-col sm:flex-row items-center justify-between space-y-3 sm:space-y-0">
        <div class="text-xs sm:text-sm text-gray-600">
            Menampilkan <span class="font-medium">1 - 10</span> dari <span class="font-medium">36</span> data
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

    <!-- Floating Action Button untuk Tambah Siswa -->
    <div class="fixed bottom-4 sm:bottom-8 right-4 sm:right-8">
        <button onclick="openModal('tambahSiswaModal')" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl sm:rounded-2xl px-4 sm:px-6 py-2 sm:py-3 shadow-lg hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 flex items-center space-x-1 sm:space-x-2 group transform hover:scale-105">
            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            <span class="text-xs sm:text-base">Tambah Siswa</span>
        </button>
    </div>

    <!-- Modal Tambah/Edit Siswa -->
    <div id="tambahSiswaModal" class="fixed inset-0 bg-black bg-opacity-50 hidden overflow-y-auto h-full w-full z-50 flex items-center justify-center">
        <div class="relative mx-auto p-8 w-full max-w-md shadow-2xl rounded-2xl bg-white transform transition-all">
            <div class="absolute top-4 right-4">
                <button onclick="closeModal('tambahSiswaModal')" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <div class="mt-2">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="p-2 bg-blue-100 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900">Tambah Siswa Baru</h3>
                </div>

                <form action="{{ route('wali.siswa.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <input type="hidden" name="id_kelas" id="id_kelas">
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const kelasSelect = document.querySelector('select[name="nama_kelas"]');
                            const idKelasInput = document.getElementById('id_kelas');

                            kelasSelect.addEventListener('change', function() {
                                const selectedKelas = this.value;
                                fetch(`/api/kelas/${selectedKelas}`)
                                    .then(response => response.json())
                                    .then(data => {
                                        idKelasInput.value = data.id;
                                    })
                                    .catch(error => console.error('Error:', error));
                            });
                        });
                    </script>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kelas</label>
                        <select name="nama_kelas" class="block w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm">
                            <option value="">Pilih Kelas</option>
                            @foreach(\App\Models\Kelas::where('wali_kelas', Auth::user()->name)->orderBy('nama_kelas')->get() as $kelas)
                                <option value="{{ $kelas->nama_kelas }}">{{ $kelas->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <input type="hidden" name="nip" value="{{ Auth::user()->nip }}">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Wali Kelas</label>
                        <input type="text" value="{{ Auth::user()->name }}" class="block w-full px-4 py-3 rounded-lg border border-gray-200 bg-gray-100" readonly>
                        <input type="hidden" name="wali_kelas" value="{{ Auth::user()->name }}">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jurusan</label>
                        <select name="jurusan" class="block w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm">
                            <option value="">Pilih Jurusan</option>
                            @foreach(\App\Models\Kelas::where('wali_kelas', Auth::user()->name)->select('jurusan')->distinct()->orderBy('jurusan')->get() as $kelas)
                                <option value="{{ $kelas->jurusan }}">{{ $kelas->jurusan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="relative">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Daftar Siswa</label>
                        <div class="flex space-x-2">
                            <!-- Combobox dropdown -->
                            <select name="nama_siswa_select" id="nama_siswa_select"
                                class="w-1/2 px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm">
                                <option value="">Pilih Siswa</option>
                                @foreach(\App\Models\Murid::select('name', 'nis', 'id', 'nisn')->orderBy('name')->get() as $siswa)
                                    <option value="{{ $siswa->name }}" data-nis="{{ $siswa->nis }}" data-id="{{ $siswa->id }}" data-nisn="{{ $siswa->nisn }}">{{ $siswa->name }} ({{ $siswa->nis }})</option>
                                @endforeach
                            </select>

                            <!-- Search input -->
                            <input type="text" name="nama_siswa" id="nama_siswa"
                                class="w-1/2 px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                placeholder="Cari berdasarkan nama atau NIS..."
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
                        const siswaList = {!! json_encode(\App\Models\Murid::select('name', 'nis', 'id', 'nisn')->orderBy('name')->get()) !!};

                        // Handle combobox selection
                        namaSiswaSelect.addEventListener('change', function() {
                            const selectedOption = this.options[this.selectedIndex];
                            if (selectedOption.value) {
                                namaSiswaInput.value = selectedOption.value;
                                const siswaData = {
                                    id: selectedOption.dataset.id,
                                    name: selectedOption.value,
                                    nis: selectedOption.dataset.nis,
                                    nisn: selectedOption.dataset.nisn
                                };
                                document.getElementsByName('daftar_siswa')[0].value = JSON.stringify(siswaData);
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
                                         onclick="selectSiswa('${siswa.name}', '${siswa.nis}', '${siswa.id}', '${siswa.nisn}')">
                                        ${siswa.name}
                                    </div>
                                `).join('');

                            siswaDropdown.classList.remove('hidden');
                        });

                        function selectSiswa(name, nis, id, nisn) {
                            namaSiswaInput.value = name;
                            namaSiswaSelect.value = name;
                            const siswaData = {
                                id: id,
                                name: name,
                                nis: nis,
                                nisn: nisn
                            };
                            document.getElementsByName('daftar_siswa')[0].value = JSON.stringify(siswaData);
                            siswaDropdown.classList.add('hidden');
                        }

                        // Hide dropdown when clicking outside
                        document.addEventListener('click', function(e) {
                            if (!namaSiswaInput.contains(e.target) && !siswaDropdown.contains(e.target)) {
                                siswaDropdown.classList.add('hidden');
                            }
                        });
                    </script>

                    <input type="hidden" name="daftar_siswa">

                    <div class="flex justify-end space-x-3 mt-8">
                        <button type="button" onclick="closeModal('tambahSiswaModal')" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200">
                            Batal
                        </button>
                        <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function openModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
    // Fetch wali data when modal opens
    fetchWaliData();
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}

document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const tableRows = document.querySelectorAll('tbody tr');

    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();

        tableRows.forEach(row => {
            if (row.querySelector('td[colspan]')) {
                // Skip the "Tidak ada data siswa" row
                return;
            }

            const nis = row.children[1].textContent.toLowerCase();
            const name = row.children[2].textContent.toLowerCase();
            
            const matchFound = nis.includes(searchTerm) || name.includes(searchTerm);
            row.style.display = matchFound ? '' : 'none';
        });

        // Show "No results found" if all rows are hidden
        const visibleRows = Array.from(tableRows).filter(row => row.style.display !== 'none');
        const noDataRow = document.querySelector('tr td[colspan]')?.parentElement;
        
        if (visibleRows.length === 0 && searchTerm !== '') {
            if (noDataRow) {
                noDataRow.style.display = '';
                noDataRow.querySelector('td').textContent = 'Tidak ada hasil pencarian';
            } else {
                const tbody = document.querySelector('tbody');
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td colspan="6" class="px-3 sm:px-6 py-3 sm:py-4 text-center text-sm text-gray-500">
                        Tidak ada hasil pencarian
                    </td>
                `;
                tbody.appendChild(newRow);
            }
        } else if (noDataRow) {
            noDataRow.style.display = 'none';
        }
    });
});
</script>

@endsection
