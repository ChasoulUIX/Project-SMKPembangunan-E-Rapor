@extends('guru.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-4 sm:p-6">
    <div class="border-b pb-4 mb-4">
        <h1 class="text-xl sm:text-2xl font-bold text-gray-800">Input Nilai Siswa</h1>
        <p class="text-sm sm:text-base text-gray-600">Silahkan pilih kelas dan mata pelajaran untuk menginput nilai</p>
    </div>

    <!-- Filter Section -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <div>
            <label for="kelas" class="block text-sm font-medium text-gray-700 mb-1">Pilih Kelas</label>
            <select id="kelas" name="kelas" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                <option value="">Pilih Kelas</option>
                <option value="X RPL 1">X RPL 1</option>
                <option value="X RPL 2">X RPL 2</option>
                <option value="XI RPL 1">XI RPL 1</option>
                <option value="XI RPL 2">XI RPL 2</option>
                <option value="XII RPL 1">XII RPL 1</option>
                <option value="XII RPL 2">XII RPL 2</option>
            </select>
        </div>

        <div>
            <label for="mapel" class="block text-sm font-medium text-gray-700 mb-1">Mata Pelajaran</label>
            <select id="mapel" name="mapel" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                <option value="">Pilih Mata Pelajaran</option>
                <option value="Matematika">Matematika</option>
                <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                <option value="Pemrograman Dasar">Pemrograman Dasar</option>
                <option value="Basis Data">Basis Data</option>
                <option value="Pemrograman Web">Pemrograman Web</option>
            </select>
        </div>

        <div>
            <label for="tahun_ajaran" class="block text-sm font-medium text-gray-700 mb-1">Tahun Ajaran</label>
            <select id="tahun_ajaran" name="tahun_ajaran" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                <option value="2023/2024-1">2023/2024 - Semester Ganjil</option>
                <option value="2023/2024-2">2023/2024 - Semester Genap</option>
            </select>
        </div>
    </div>

    <!-- Daftar Siswa dan Input Nilai -->
    <div class="bg-white rounded-lg border">
        <div class="p-4 border-b flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-800">Daftar Nilai Siswa</h2>
            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                Simpan Nilai
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">NIS</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Siswa</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Tugas 1</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Tugas 2</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Tugas 3</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Tugas 4</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Tugas 5</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Rata"</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nilai UTS</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nilai UAS</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nilai Sikap</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nilai Akhir</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2024001</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Ahmad Fauzi</td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <input type="number" min="0" max="100" class="w-16 px-2 py-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" onchange="hitungNilai(this)">
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <input type="number" min="0" max="100" class="w-16 px-2 py-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" onchange="hitungNilai(this)">
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <input type="number" min="0" max="100" class="w-16 px-2 py-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" onchange="hitungNilai(this)">
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <input type="number" min="0" max="100" class="w-16 px-2 py-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" onchange="hitungNilai(this)">
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <input type="number" min="0" max="100" class="w-16 px-2 py-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" onchange="hitungNilai(this)">
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900 text-center rata-tugas">0</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="number" min="0" max="100" class="w-20 px-2 py-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" onchange="hitungNilai(this)">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="number" min="0" max="100" class="w-20 px-2 py-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" onchange="hitungNilai(this)">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="number" min="0" max="100" class="w-20 px-2 py-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" onchange="hitungNilai(this)">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 nilai-akhir">0</td>
                    </tr>
                    <!-- Tambahkan data siswa lainnya di sini -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function hitungNilai(input) {
    const row = input.closest('tr');
    const tugasInputs = row.querySelectorAll('input[type="number"]');
    let totalTugas = 0;
    let countTugas = 0;
    
    // Hitung rata-rata tugas (5 nilai pertama)
    for(let i = 0; i < 5; i++) {
        if(tugasInputs[i].value) {
            totalTugas += parseFloat(tugasInputs[i].value);
            countTugas++;
        }
    }
    
    const rataTugas = countTugas > 0 ? totalTugas / countTugas : 0;
    row.querySelector('.rata-tugas').textContent = rataTugas.toFixed(1);
    
    // Ambil nilai UTS (input ke-6)
    const nilaiUTS = tugasInputs[5].value ? parseFloat(tugasInputs[5].value) : 0;
    
    // Ambil nilai UAS (input ke-7)
    const nilaiUAS = tugasInputs[6].value ? parseFloat(tugasInputs[6].value) : 0;
    
    // Ambil nilai Sikap (input ke-8)
    const nilaiSikap = tugasInputs[7].value ? parseFloat(tugasInputs[7].value) : 0;
    
    // Hitung nilai akhir (30% tugas + 30% UTS + 30% UAS + 10% sikap)
    const nilaiAkhir = (rataTugas * 0.3) + (nilaiUTS * 0.3) + (nilaiUAS * 0.3) + (nilaiSikap * 0.1);
    
    row.querySelector('.nilai-akhir').textContent = nilaiAkhir.toFixed(1);
}
</script>

@endsection
