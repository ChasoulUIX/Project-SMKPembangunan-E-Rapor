@extends('wali.layouts.app')

@section('content')
<style>
.page {
    width: 210mm;
    height: 297mm;
    padding: 20mm;
    margin: 10mm auto;
    background: white;
    box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
    page-break-after: always;
}

@media print {
    .page {
        margin: 0;
        box-shadow: none;
    }
    .no-print {
        display: none;
    }
}
</style>

<div id="rapor-content">
    <!-- Data Siswa -->
    <div class="page relative">
        <!-- Background Logo -->
        <div class="absolute inset-0 flex items-center justify-center opacity-10 pointer-events-none">
            <img src="{{ asset('images/logopembut.png') }}" alt="Logo Sekolah" class="w-96">
        </div>

        <div class="text-center mb-8 relative">
            <h1 class="text-2xl font-bold">DATA SISWA</h1>
            <h2 class="text-xl">Tahun Ajaran {{ now()->year }}/{{ now()->year + 1 }}</h2>
        </div>

        <div class="mb-8 relative">
            <table class="w-full">
                <tr>
                    <td class="py-2 w-1/3">Nama Siswa</td>
                    <td class="py-2">: {{ $murid->name }}</td>
                </tr>
                <tr>
                    <td class="py-2">NIS</td>
                    <td class="py-2">: {{ $murid->nis }}</td>
                </tr>
                <tr>
                    <td class="py-2">NISN</td>
                    <td class="py-2">: {{ $murid->nisn }}</td>
                </tr>
                <tr>
                    <td class="py-2">Kelas</td>
                    <td class="py-2">: {{ $murid->class }}</td>
                </tr>
                <tr>
                    <td class="py-2">Jurusan</td>
                    <td class="py-2">: {{ $murid->major }}</td>
                </tr>
                <tr>
                    <td class="py-2">Semester</td>
                    <td class="py-2">: {{ $murid->semester }}</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Nilai Akademik -->
    <div class="page relative">
        <!-- Background Logo -->
        <div class="absolute inset-0 flex items-center justify-center opacity-10 pointer-events-none">
            <img src="{{ asset('images/logopembut.png') }}" alt="Logo Sekolah" class="w-96">
        </div>

        <div class="text-center mb-8 relative">
            <h1 class="text-2xl font-bold">NILAI AKADEMIK</h1>
            <h2 class="text-xl">Tahun Ajaran {{ now()->year }}/{{ now()->year + 1 }}</h2>
        </div>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 p-2">No</th>
                    <th class="border border-gray-300 p-2">Mata Pelajaran</th>
                    <th class="border border-gray-300 p-2">Nilai Akhir</th>
                    <th class="border border-gray-300 p-2">Predikat</th>
                    <th class="border border-gray-300 p-2">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $daftarNilai = \App\Models\Daftarnilai::where('daftar_siswa', 'like', '%"nis":"'.$murid->nis.'"%')->get();
                @endphp
                
                @foreach($daftarNilai as $index => $nilai)
                @php
                    $nilaiAkhir = $nilai->calculateFinalScore($murid->nis);
                    $predikat = '';
                    if($nilaiAkhir >= 90) $predikat = 'A';
                    elseif($nilaiAkhir >= 80) $predikat = 'B';
                    elseif($nilaiAkhir >= 70) $predikat = 'C';
                    else $predikat = 'D';
                @endphp
                <tr>
                    <td class="border border-gray-300 p-2 text-center">{{ $index + 1 }}</td>
                    <td class="border border-gray-300 p-2">{{ $nilai->nama_pelajaran }}</td>
                    <td class="border border-gray-300 p-2 text-center">{{ number_format($nilaiAkhir, 1) }}</td>
                    <td class="border border-gray-300 p-2 text-center">{{ $predikat }}</td>
                    <td class="border border-gray-300 p-2">{{ $nilai->sikap[$murid->nis] ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Kehadiran -->
    <div class="page relative">
        <!-- Background Logo -->
        <div class="absolute inset-0 flex items-center justify-center opacity-10 pointer-events-none">
            <img src="{{ asset('images/logopembut.png') }}" alt="Logo Sekolah" class="w-96">
        </div>

        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold">KEHADIRAN SISWA</h1>
            <h2 class="text-xl">Tahun Ajaran {{ now()->year }}/{{ now()->year + 1 }}</h2>
        </div>

        <table class="w-full border-collapse border border-gray-300">
            <tr>
                <td class="border border-gray-300 p-2 w-1/3">Sakit</td>
                <td class="border border-gray-300 p-2">: {{ $murid->kehadiran['sakit'] ?? 0 }} hari</td>
                <td class="border border-gray-300 p-2">Dengan Surat Keterangan Dokter</td>
            </tr>
            <tr>
                <td class="border border-gray-300 p-2">Izin</td>
                <td class="border border-gray-300 p-2">: {{ $murid->kehadiran['izin'] ?? 0 }} hari</td>
                <td class="border border-gray-300 p-2">Dengan Surat Izin Orang Tua/Wali</td>
            </tr>
            <tr>
                <td class="border border-gray-300 p-2">Tanpa Keterangan</td>
                <td class="border border-gray-300 p-2">: {{ $murid->kehadiran['alpha'] ?? 0 }} hari</td>
                <td class="border border-gray-300 p-2">Tidak Hadir Tanpa Keterangan</td>
            </tr>
        </table>
    </div>
</div>

<!-- Download Buttons -->
<div class="flex justify-center gap-4 mt-8 mb-8 no-print">
    <form action="{{ route('wali.rapor.downloadPDF') }}" method="GET" class="inline">
        <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 cursor-pointer">
            Download PDF
        </button>
    </form>

    <form action="{{ route('wali.rapor.downloadImage') }}" method="GET" class="inline">
        <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 cursor-pointer">
            Download PNG
        </button>
    </form>
</div>

@push('scripts')
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script>
document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const element = document.getElementById('rapor-content');
        const canvas = await html2canvas(element, {
            scale: 2,
            useCORS: true,
            logging: true
        });

        // Convert canvas to blob
        canvas.toBlob(async (blob) => {
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = form.action.includes('downloadPDF') ? 
                'rapor-{{ $murid->name }}.pdf' : 
                'rapor-{{ $murid->name }}.png';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            window.URL.revokeObjectURL(url);
        }, form.action.includes('downloadPDF') ? 'application/pdf' : 'image/png');
    });
});
</script>
@endpush

@endsection
