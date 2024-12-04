@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <div class="flex justify-between items-center border-b pb-4 mb-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Wali Kelas</h1>
            <p class="text-sm text-gray-600">Kelola data wali kelas SMK Pembangunan Bogor</p>
        </div>
        <button onclick="openCreateModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            Tambah Wali Kelas
        </button>
    </div>

    <!-- Search and Filter -->
    <div class="flex flex-col md:flex-row gap-4 mb-6">
        <div class="flex-1">
            <div class="relative">
                <input type="text" id="search" class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Cari wali kelas...">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIP</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @php
                    $walis = \App\Models\Wali::all();
                @endphp
                @foreach($walis as $wali)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $wali->nip }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $wali->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $wali->email }}</td>
                    <td class="px-6 py-4 text-right text-sm font-medium">
                        <button onclick="openEditModal({{ $wali->id }})" class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                        <form action="{{ route('admin.pages.wali.destroy', $wali->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus wali kelas ini?')" 
                                    class="text-red-600 hover:text-red-900">Hapus</button>
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
                <h3 class="text-lg font-medium text-gray-900">Tambah Wali Kelas Baru</h3>
            </div>
            <form action="{{ route('admin.pages.wali.store') }}" method="POST" class="p-6">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">NIP</label>
                        <input type="text" name="nip" id="nip" required readonly class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 bg-gray-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama</label>
                        <select name="name" id="name" required onchange="updateFields(this)" class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Pilih Wali Kelas</option>
                            @foreach(\App\Models\Guru::orderBy('name')->get() as $guru)
                                <option value="{{ $guru->name }}" 
                                    data-nip="{{ $guru->nip }}"
                                    data-email="{{ $guru->email }}"
                                    data-password="password123">{{ $guru->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <script>
                        function updateFields(selectElement) {
                            const selectedOption = selectElement.options[selectElement.selectedIndex];
                            
                            // Update NIP
                            const nipInput = document.getElementById('nip');
                            nipInput.value = selectedOption.dataset.nip || '';
                            
                            // Update Email 
                            const emailInput = document.querySelector('input[name="email"]');
                            emailInput.value = selectedOption.dataset.email || '';
                            
                            // Update Password
                            const passwordInput = document.querySelector('input[name="password"]');
                            passwordInput.value = selectedOption.dataset.password || '';
                        }
                    </script>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" required readonly class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 bg-gray-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" required readonly class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 bg-gray-100">
                    </div>
                    <input type="hidden" name="role" value="wali">
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="closeCreateModal()" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="relative bg-white rounded-lg max-w-lg w-full">
            <div class="px-6 py-4 border-b">
                <h3 class="text-lg font-medium text-gray-900">Edit Wali Kelas</h3>
            </div>
            <form id="editForm" method="POST" class="p-6">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">NIP</label>
                        <input type="text" name="nip" id="edit_nip" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="name" id="edit_name" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="edit_email" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password" class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <input type="hidden" name="role" value="wali">
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="closeEditModal()" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Simpan Perubahan</button>
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

function openEditModal(id) {
    document.getElementById('editModal').classList.remove('hidden');
    
    fetch(`/admin/wali/${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('editForm').action = `/admin/wali/${id}`;
                document.getElementById('edit_nip').value = data.data.nip;
                document.getElementById('edit_name').value = data.data.name;
                document.getElementById('edit_email').value = data.data.email;
            } else {
                alert('Error loading wali data');
                closeEditModal();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error loading wali data');
            closeEditModal();
        });
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}
</script>
@endsection
