@extends('guru.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
    <div class="border-b pb-4 mb-4">
        <h1 class="text-xl sm:text-2xl font-bold text-gray-800">Input Nilai Siswa</h1>
        <p class="text-sm sm:text-base text-gray-600">Silahkan pilih kelas dan mata pelajaran untuk menginput nilai</p>
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
    <div class="relative top-20 mx-auto p-8 border w-[500px] shadow-2xl rounded-xl bg-white transform transition-all duration-300">
        <div class="mt-2">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Tambah Nilai Baru</h3>
            <form action="{{ route('guru.nilai.store') }}" method="POST">
                @csrf
                <div class="space-y-6">
                    <div class="relative">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">NIS</label>
                        <input type="number" name="nis" id="nis"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                            placeholder="NIS akan terisi otomatis"
                            readonly
                            required>
                    </div>

                    <div class="relative">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Siswa</label>
                        <select name="nama_siswa" id="nama_siswa"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                            onchange="updateNIS(this)"
                            required>
                            <option value="">Pilih Siswa</option>
                            @foreach(\App\Models\Murid::orderBy('name')->get() as $siswa)
                                <option value="{{ $siswa->name }}" data-nis="{{ $siswa->nis }}">{{ $siswa->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <script>
                        function updateNIS(select) {
                            const selectedOption = select.options[select.selectedIndex];
                            const nis = selectedOption.getAttribute('data-nis');
                            document.getElementById('nis').value = nis || '';
                        }
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
                        <input type="text" name="nama_mapel" id="nama_mapel"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                            placeholder="Mata Pelajaran akan terisi otomatis"
                            value="{{ \App\Models\Matapelajaran::where('nama_guru', Auth::user()->name)->first()->nama_mapel ?? '' }}"
                            readonly
                            required>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">UTS</label>
                            <input type="number" name="uts" min="0" max="100"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                placeholder="0-100"
                                required>
                        </div>

                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">UAS</label>
                            <input type="number" name="uas" min="0" max="100"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out text-sm"
                                placeholder="0-100"
                                required>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-4 mt-8">
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

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Edit Nilai</h3>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">UTS</label>
                    <input type="number" name="uts" id="edit_uts" min="0" max="100" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">UAS</label>
                    <input type="number" name="uas" id="edit_uas" min="0" max="100" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" required>
                </div>
                <div class="flex justify-end space-x-3">
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
</script>

@endsection
