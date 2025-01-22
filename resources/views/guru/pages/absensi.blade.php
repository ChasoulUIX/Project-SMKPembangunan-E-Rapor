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
            <select id="kelas-filter" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Pilih Kelas</option>
                @foreach(\App\Models\Kelas::all() as $k)
                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Absensi Table -->
    <div class="bg-white rounded-lg border">
        <div class="p-4 border-b flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-800">Daftar Absensi</h2>
            <button id="saveAbsensi" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
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
                    @php
                        $nilaiSiswa = \App\Models\Nilaisiswa::where('nama_guru', Auth::user()->name)->get();
                        $no = 1;
                    @endphp
                    @forelse($nilaiSiswa as $nilai)
                    <tr data-kelas="{{ $nilai->id_kelas }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $no++ }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $nilai->nis }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $nilai->nama_siswa }}</td>
                        @for($i = 1; $i <= 16; $i++)
                        <td class="px-4 py-4 whitespace-nowrap text-center">
                            <input type="checkbox" 
                                   name="pertemuan[{{ $nilai->id }}][p{{ $i }}]"
                                   class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500" 
                                   onchange="hitungKehadiran(this)"
                                   {{ $nilai->{'p'.$i} ? 'checked' : '' }}>
                        </td>
                        @endfor
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900" id="totalHadir">
                            {{ collect(range(1,16))->sum(fn($i) => $nilai->{'p'.$i} ? 1 : 0) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900" id="nilaiKehadiran">
                            {{ number_format(collect(range(1,16))->sum(fn($i) => $nilai->{'p'.$i} ? 1 : 0) / 16 * 100, 1) }}%
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="20" class="px-6 py-4 text-center text-sm text-gray-500">
                            Tidak ada data absensi
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add CSRF token for Ajax request -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
// Add filter functionality
document.getElementById('kelas-filter').addEventListener('change', function() {
    const selectedKelas = this.value;
    const rows = document.querySelectorAll('tbody tr');
    
    rows.forEach(row => {
        if (!selectedKelas || row.dataset.kelas === selectedKelas) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

// Update the hitungKehadiran function
function hitungKehadiran(checkbox) {
    const row = checkbox.closest('tr');
    const checkboxes = row.querySelectorAll('input[type="checkbox"]');
    const totalPertemuan = 16; // Total fixed pertemuan
    let totalHadir = 0;
    
    checkboxes.forEach(cb => {
        if (cb.checked) totalHadir++;
    });
    
    const nilaiKehadiran = (totalHadir / totalPertemuan) * 100;
    
    row.querySelector('#totalHadir').textContent = totalHadir;
    row.querySelector('#nilaiKehadiran').textContent = nilaiKehadiran.toFixed(1) + '%';
}

// Add new save functionality
document.getElementById('saveAbsensi').addEventListener('click', function() {
    const attendanceData = [];
    const rows = document.querySelectorAll('tbody tr[data-kelas]');
    
    rows.forEach(row => {
        const nilaiId = row.querySelector('input[type="checkbox"]')
            .name.match(/pertemuan\[(\d+)\]/)[1];
            
        const attendance = {};
        for(let i = 1; i <= 16; i++) {
            const checkbox = row.querySelector(`input[name="pertemuan[${nilaiId}][p${i}]"]`);
            attendance[`p${i}`] = checkbox.checked ? 1 : 0;
        }
        
        attendanceData.push({
            nilai_id: nilaiId,
            attendance: attendance
        });
    });

    // Send data to server
    fetch('/guru/absensi/update', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ data: attendanceData })
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            alert('Absensi berhasil disimpan!');
        } else {
            alert('Terjadi kesalahan saat menyimpan absensi.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menyimpan absensi.');
    });
});
</script>

@endsection
