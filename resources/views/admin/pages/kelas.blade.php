@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Manajemen Kelas</h1>
        <button onclick="openCreateModal()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Tambah Kelas
        </button>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Kelas</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jurusan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Wali Kelas</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($kelas as $kls)
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $kls->nama_kelas }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $kls->jurusan }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $kls->wali_kelas ?? '-' }}</td>
                  
                    <td class="px-6 py-4 text-sm text-gray-900">
                        <button onclick="openEditModal({{ $kls->id }}, '{{ $kls->nama_kelas }}', '{{ $kls->jurusan }}', '{{ $kls->wali_id }}')" class="text-blue-600 hover:text-blue-800 mr-3">Edit</button>
                        <form action="{{ route('admin.pages.kelas.destroy', $kls) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')" 
                                    class="text-red-600 hover:text-red-800">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Create Modal -->
<div id="createModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="relative bg-white rounded-lg max-w-lg w-full">
            <div class="px-6 py-4 border-b">
                <h3 class="text-lg font-medium text-gray-900">Tambah Kelas Baru</h3>
            </div>
            <form action="{{ route('admin.pages.kelas.store') }}" method="POST" class="p-6">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Kelas</label>
                        <input type="text" name="nama_kelas" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jurusan</label>
                        <select name="jurusan" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Pilih Jurusan</option>
                            <option value="Multimedia">Multimedia</option>
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Perkantoran">Perkantoran</option>
                            <option value="Pemasaran">Pemasaran</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Wali Kelas</label>
                        <select name="wali_id" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Pilih Wali Kelas</option>
                            @foreach(App\Models\Wali::where('role', 'wali')->get() as $wali)
                                <option value="{{ $wali->id }}">{{ $wali->nip }} - {{ $wali->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="closeCreateModal()" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        Batal
                    </button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-[800px] shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center pb-3">
            <h3 class="text-lg font-medium">Edit Data Kelas</h3>
            <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-500">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Kelas</label>
                    <input type="text" name="nama_kelas" id="edit_nama_kelas" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Jurusan</label>
                    <select name="jurusan" id="edit_jurusan" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Pilih Jurusan</option>
                        <option value="Multimedia">Multimedia</option>
                        <option value="Akuntansi">Akuntansi</option>
                        <option value="Perkantoran">Perkantoran</option>
                        <option value="Pemasaran">Pemasaran</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Wali Kelas</label>
                    <select name="wali_id" id="edit_wali_id" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Pilih Wali Kelas</option>
                        @foreach(App\Models\Wali::where('role', 'wali')->get() as $wali)
                            <option value="{{ $wali->id }}">{{ $wali->nip }} - {{ $wali->name }}</option>
                        @endforeach
                    </select>
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
    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('editForm').action = `/admin/kelas/${id}`;
    
    // Fetch kelas data and populate form
    fetch(`/admin/kelas/${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('edit_nama_kelas').value = data.nama_kelas;
            document.getElementById('edit_jurusan').value = data.jurusan;
            document.getElementById('edit_wali_id').value = data.wali.id;
        });
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}
</script>

@endsection
