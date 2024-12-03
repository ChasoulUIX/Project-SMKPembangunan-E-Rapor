@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
    <div class="flex justify-between items-center border-b pb-4 mb-4">
        <div>
            <h1 class="text-xl sm:text-2xl font-bold text-gray-800">Manajemen Mata Pelajaran</h1>
            <p class="text-sm sm:text-base text-gray-600">Kelola data mata pelajaran</p>
        </div>
        <button onclick="openCreateModal()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Tambah Mapel
        </button>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Mapel</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Guru Pengajar</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">KKM</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @if(isset($matapelajarans))
                    @foreach($matapelajarans as $mapel)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $mapel->kode_mapel }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $mapel->nama_mapel }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $mapel->nama_guru }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $mapel->kkm }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <button onclick="openEditModal('{{ $mapel->id }}')" class="text-blue-600 hover:text-blue-900">Edit</button>
                            <form action="{{ route('admin.pages.matapelajaran.destroy', $mapel->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ml-2 text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada data mata pelajaran</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<!-- Create Modal -->
<div id="createModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center pb-3 border-b">
            <h3 class="text-lg font-medium">Tambah Mata Pelajaran</h3>
            <button onclick="closeCreateModal()" class="text-gray-400 hover:text-gray-500">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <form action="{{ route('admin.pages.matapelajaran.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Kode Mapel</label>
                    <input type="text" name="kode_mapel" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Mapel</label>
                    <input type="text" name="nama_mapel" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Guru Pengajar</label>
                    <select name="nip" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Pilih Guru</option>
                        @forelse($gurus ?? [] as $guru)
                            <option value="{{ $guru->nip }}">{{ $guru->name }}</option>
                        @empty
                            <option value="" disabled>Tidak ada data guru</option>
                        @endforelse
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">KKM</label>
                    <input type="number" name="kkm" required min="0" max="100" class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
            <div class="mt-6 flex justify-end space-x-3">
                <button type="button" onclick="closeCreateModal()" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Batal</button>
                <button type="submit" class="bg-blue-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center pb-3 border-b">
            <h3 class="text-lg font-medium">Edit Mata Pelajaran</h3>
            <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-500">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <form id="editForm" method="POST" class="mt-4">
            @csrf
            @method('PUT')
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Kode Mapel</label>
                    <input type="text" name="kode_mapel" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Mapel</label>
                    <input type="text" name="nama_mapel" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Guru Pengajar</label>
                    <select name="nip" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Pilih Guru</option>
                        @forelse($gurus ?? [] as $guru)
                            <option value="{{ $guru->nip }}">{{ $guru->name }}</option>
                        @empty
                            <option value="" disabled>Tidak ada data guru</option>
                        @endforelse
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">KKM</label>
                    <input type="number" name="kkm" required min="0" max="100" class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
            <div class="mt-6 flex justify-end space-x-3">
                <button type="button" onclick="closeEditModal()" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Batal</button>
                <button type="submit" class="bg-blue-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<script>
function openCreateModal() {
    document.getElementById('createModal').classList.remove('hidden');
}

function closeCreateModal() {
    document.getElementById('createModal').classList.add('hidden');
}

function openEditModal(id) {
    fetch(`/admin/pages/matapelajaran/${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.querySelector('#editForm').action = `/admin/pages/matapelajaran/${id}`;
                document.querySelector('#editForm [name="kode_mapel"]').value = data.data.kode_mapel;
                document.querySelector('#editForm [name="nama_mapel"]').value = data.data.nama_mapel;
                document.querySelector('#editForm [name="kkm"]').value = data.data.kkm;
                
                // Set selected guru in dropdown
                const guruSelect = document.querySelector('#editForm [name="nip"]');
                Array.from(guruSelect.options).forEach(option => {
                    if (option.text === data.data.nama_guru) {
                        option.selected = true;
                    }
                });
                
                document.getElementById('editModal').classList.remove('hidden');
            }
        });
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}
</script>
@endsection
