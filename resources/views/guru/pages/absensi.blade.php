@extends('guru.layouts.app')

@section('content')
<div class="p-6 space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900">Absensi Siswa</h1>
            <p class="mt-1 text-sm text-gray-600">Kelola absensi siswa per pertemuan</p>
        </div>
        
        <!-- Filter Controls -->
        <div class="flex flex-col sm:flex-row gap-4">
            <select class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Pilih Kelas</option>
                <option value="X RPL 1">X RPL 1</option>
                <option value="X RPL 2">X RPL 2</option>
                <option value="XI RPL 1">XI RPL 1</option>
            </select>
        </div>
    </div>

    <!-- Absensi Table -->
    <div class="bg-white rounded-lg border">
        <div class="p-4 border-b flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-800">Daftar Absensi</h2>
            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                Simpan Absensi
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">NIS</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Siswa</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">P1</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">P2</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">P3</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">P4</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">P5</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">P6</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">P7</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">P8</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">P9</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">P10</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">P11</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">P12</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">P13</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">P14</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">P15</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">P16</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Total Hadir</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Nilai (%)</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2024001</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Ahmad Fauzi</td>
                        <td class="px-4 py-4 whitespace-nowrap text-center">
                            <input type="checkbox" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500" onchange="hitungKehadiran(this)">
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-center">
                            <input type="checkbox" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500" onchange="hitungKehadiran(this)">
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-center">
                            <input type="checkbox" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500" onchange="hitungKehadiran(this)">
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-center">
                            <input type="checkbox" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500" onchange="hitungKehadiran(this)">
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-center">
                            <input type="checkbox" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500" onchange="hitungKehadiran(this)">
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-center">
                            <input type="checkbox" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500" onchange="hitungKehadiran(this)">
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-center">
                            <input type="checkbox" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500" onchange="hitungKehadiran(this)">
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-center">
                            <input type="checkbox" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500" onchange="hitungKehadiran(this)">
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-center">
                            <input type="checkbox" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500" onchange="hitungKehadiran(this)">
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-center">
                            <input type="checkbox" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500" onchange="hitungKehadiran(this)">
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-center">
                            <input type="checkbox" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500" onchange="hitungKehadiran(this)">
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-center">
                            <input type="checkbox" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500" onchange="hitungKehadiran(this)">
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-center">
                            <input type="checkbox" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500" onchange="hitungKehadiran(this)">
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-center">
                            <input type="checkbox" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500" onchange="hitungKehadiran(this)">
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-center">
                            <input type="checkbox" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500" onchange="hitungKehadiran(this)">
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-center">
                            <input type="checkbox" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500" onchange="hitungKehadiran(this)">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900" id="totalHadir">0</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900" id="nilaiKehadiran">0%</td>
                    </tr>
                    <!-- Tambahkan data siswa lainnya di sini -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function hitungKehadiran(checkbox) {
    const row = checkbox.closest('tr');
    const checkboxes = row.querySelectorAll('input[type="checkbox"]');
    const totalPertemuan = checkboxes.length;
    let totalHadir = 0;
    
    checkboxes.forEach(cb => {
        if (cb.checked) totalHadir++;
    });
    
    const nilaiKehadiran = (totalHadir / totalPertemuan) * 100;
    
    row.querySelector('#totalHadir').textContent = totalHadir;
    row.querySelector('#nilaiKehadiran').textContent = nilaiKehadiran.toFixed(1) + '%';
}
</script>

@endsection
