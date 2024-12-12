@extends('wali.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <div class="flex justify-between items-center border-b pb-4 mb-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Siswa</h1>
            <p class="text-sm text-gray-600">Kelola data siswa SMK Pembangunan Bogor</p>
        </div>
        <button onclick="openCreateModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            Tambah Siswa
        </button>
    </div>

    <!-- Search and Filter -->
    <div class="flex flex-col md:flex-row gap-4 mb-6">
        <div class="flex-1">
            <div class="relative">
                <input type="text" 
                       id="searchInput" 
                       class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                       placeholder="Cari berdasarkan NIS atau nama siswa...">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="flex gap-4">
            <select class="border rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">Semua Kelas</option>
                <option value="X">Kelas X</option>
                <option value="XI">Kelas XI</option>
                <option value="XII">Kelas XII</option>
            </select>
            <select class="border rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">Semua Jurusan</option>
                <option value="multimedia">Multimedia</option>
                <option value="akuntansi">Akuntansi</option>
                <option value="perkantoran">Perkantoran</option>
                <option value="pemasaran">Pemasaran</option>
            </select>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIS</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jurusan</th>
                    <!-- <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th> -->
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach(App\Models\Murid::all() as $murid)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $murid->nis }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-10 w-10 flex-shrink-0">
                                @if($murid->photo)
                                    <img class="h-10 w-10 rounded-full" src="{{ asset($murid->photo) }}" alt="{{ $murid->name }}">
                                @else
                                    <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($murid->name) }}" alt="{{ $murid->name }}">
                                @endif
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $murid->name }}</div>
                                <div class="text-sm text-gray-500">{{ $murid->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $murid->class }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ ucfirst($murid->major) }}</td>
                    <!-- <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button type="button" onclick="openEditModal('{{ $murid->nis }}')" class="text-blue-600 hover:text-blue-900 mr-4">Edit</button>
                        <form action="{{ route('wali.siswa.destroy', $murid->nis) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data siswa ini?')" class="text-red-600 hover:text-red-900">Hapus</button>
                        </form>
                    </td> -->
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
        <div class="relative bg-white rounded-lg max-w-6xl w-full">
            <div class="px-6 py-4 border-b">
                <h3 class="text-lg font-medium text-gray-900">Tambah Siswa Baru</h3>
                <button type="button" onclick="closeCreateModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Close</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form action="{{ route('wali.tambahsiswa.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                <div class="grid grid-cols-3 gap-6">
                    <!-- Column 1 -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">NIS</label>
                            <input type="text" name="nis" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">NISN</label>
                            <input type="text" name="nisn" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" name="name" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" name="password" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                            <select name="gender" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Foto</label>
                            <input type="file" name="photo" class="mt-1 block w-full">
                        </div>
                    </div>

                    <!-- Column 2 -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                            <input type="text" name="birth_place" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                            <input type="date" name="birth_date" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Alamat</label>
                            <textarea name="address" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">No. Telepon</label>
                            <input type="text" name="phone_number" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Ayah</label>
                            <input type="text" name="father_name" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Ibu</label>
                            <input type="text" name="mother_name" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <!-- Column 3 -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">No. Telepon Orang Tua</label>
                            <input type="text" name="parent_phone" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Alamat Orang Tua</label>
                            <textarea name="parent_address" class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kelas</label>
                            <select name="class" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                @foreach(App\Models\Kelas::all() as $kls)
                                    <option value="{{ $kls->nama_kelas }}">{{ $kls->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jurusan</label>
                            <select name="major" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="multimedia">Multimedia</option>
                                <option value="akuntansi">Akuntansi</option>
                                <option value="perkantoran">Perkantoran</option>
                                <option value="pemasaran">Pemasaran</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tahun Akademik</label>
                            <input type="number" name="academic_year" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Semester</label>
                            <select name="semester" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                        <input type="hidden" name="role" value="murid">
                    </div>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="closeCreateModal()" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Batal</button>
                    <button type="submit" class="bg-blue-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-[800px] shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center pb-3">
            <h3 class="text-lg font-medium">Edit Data Siswa</h3>
            <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-500">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form id="editForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-3 gap-6">
                <!-- Column 1 -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">NIS</label>
                        <input type="text" name="nis" id="edit_nis" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">NISN</label>
                        <input type="text" name="nisn" id="edit_nisn" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="name" id="edit_name" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="edit_email" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Password (Kosongkan jika tidak ingin mengubah)</label>
                        <input type="password" name="password" id="edit_password" class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <select name="gender" id="edit_gender" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Foto</label>
                        <input type="file" name="photo" id="edit_photo" class="mt-1 block w-full">
                        <div id="current_photo" class="mt-2"></div>
                    </div>
                </div>

                <!-- Column 2 -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                        <input type="text" name="birth_place" id="edit_birth_place" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" name="birth_date" id="edit_birth_date" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea name="address" id="edit_address" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">No. Telepon</label>
                        <input type="text" name="phone_number" id="edit_phone_number" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Ayah</label>
                        <input type="text" name="father_name" id="edit_father_name" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Ibu</label>
                        <input type="text" name="mother_name" id="edit_mother_name" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <!-- Column 3 -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">No. Telepon Orang Tua</label>
                        <input type="text" name="parent_phone" id="edit_parent_phone" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Alamat Orang Tua</label>
                        <textarea name="parent_address" id="edit_parent_address" class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Kelas</label>
                        <select name="class" id="edit_class" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @foreach(App\Models\Kelas::all() as $kls)
                                <option value="{{ $kls->nama_kelas }}">{{ $kls->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jurusan</label>
                        <select name="major" id="edit_major" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="multimedia">Multimedia</option>
                            <option value="akuntansi">Akuntansi</option>
                            <option value="perkantoran">Perkantoran</option>
                            <option value="pemasaran">Pemasaran</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tahun Akademik</label>
                        <input type="number" name="academic_year" id="edit_academic_year" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Semester</label>
                        <select name="semester" id="edit_semester" required class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <input type="hidden" name="role" value="murid">
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

function openEditModal(nis) {
    fetch(`/wali/siswa/${nis}/edit`)
        .then(response => response.json())
        .then(data => {
            const murid = data.murid;
            document.getElementById('editForm').action = `/wali/siswa/${nis}`;
            document.getElementById('edit_nis').value = murid.nis;
            document.getElementById('edit_nisn').value = murid.nisn;
            document.getElementById('edit_name').value = murid.name;
            document.getElementById('edit_email').value = murid.email;
            document.getElementById('edit_gender').value = murid.gender;
            document.getElementById('edit_birth_place').value = murid.birth_place;
            document.getElementById('edit_birth_date').value = murid.birth_date;
            document.getElementById('edit_address').value = murid.address;
            document.getElementById('edit_phone_number').value = murid.phone_number;
            document.getElementById('edit_father_name').value = murid.father_name;
            document.getElementById('edit_mother_name').value = murid.mother_name;
            document.getElementById('edit_parent_phone').value = murid.parent_phone;
            document.getElementById('edit_parent_address').value = murid.parent_address;
            document.getElementById('edit_class').value = murid.class;
            document.getElementById('edit_major').value = murid.major;
            document.getElementById('edit_academic_year').value = murid.academic_year;
            document.getElementById('edit_semester').value = murid.semester;
            
            if (murid.photo) {
                const photoUrl = murid.photo.startsWith('http') ? murid.photo : `/${murid.photo}`;
                document.getElementById('current_photo').innerHTML = `
                    <img src="${photoUrl}" alt="Current photo" class="h-20 w-20 object-cover rounded-full">
                `;
            }
            
            document.getElementById('editModal').classList.remove('hidden');
        })
        .catch(error => console.error('Error:', error));
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}

document.getElementById('searchInput').addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase();
    const tableRows = document.querySelectorAll('tbody tr');

    tableRows.forEach(row => {
        const nis = row.querySelector('td:first-child').textContent.toLowerCase();
        const name = row.querySelector('td:nth-child(2) .text-sm.font-medium').textContent.toLowerCase();
        
        if (nis.includes(searchValue) || name.includes(searchValue)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>
@endsection
