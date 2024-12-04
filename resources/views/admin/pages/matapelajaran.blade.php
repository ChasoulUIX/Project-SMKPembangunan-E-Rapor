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
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @php
                    $matapelajarans = \App\Models\Matapelajaran::all();
                @endphp
                @if($matapelajarans->count() > 0)
                    @foreach($matapelajarans as $matapelajaran)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $matapelajaran->kode_mapel }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $matapelajaran->nama_mapel }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $matapelajaran->nama_guru }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <button onclick="openEditModal({{ $matapelajaran->id }})" class="text-blue-600 hover:text-blue-900 mr-2">Edit</button>
                            <a href="{{ route('admin.pages.matapelajaran.show', $matapelajaran->id) }}" class="text-blue-600 hover:text-blue-900">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada data mata pelajaran
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<!-- Create Modal -->
<div id="createModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Tambah Mata Pelajaran</h3>
            <form id="createForm" action="{{ route('admin.pages.matapelajaran.store') }}" method="POST" class="mt-4">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="kode_mapel">Kode Mapel</label>
                    <input type="text" name="kode_mapel" id="kode_mapel" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_mapel">Nama Mapel</label>
                    <input type="text" name="nama_mapel" id="nama_mapel" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_guru">Guru Pengajar</label>
                    <select name="nama_guru" id="nama_guru" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="">Pilih Guru</option>
                        @foreach(\App\Models\Guru::orderBy('name')->get() as $guru)
                            <option value="{{ $guru->name }}">{{ $guru->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="closeCreateModal()" class="mr-2 px-4 py-2 text-gray-500 hover:text-gray-700">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                </div>
            </form>
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

// Handle Create Form Submit
document.getElementById('createForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    fetch('{{ route("admin.pages.matapelajaran.store") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            closeCreateModal();
            location.reload();
        } else {
            alert('Gagal menambahkan data mata pelajaran');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menambahkan data');
    });
});
</script>
@endsection
