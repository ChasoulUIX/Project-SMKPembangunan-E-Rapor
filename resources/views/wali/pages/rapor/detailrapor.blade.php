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
    position: relative;
}
.download-buttons {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin: 2rem 0;
}
.download-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
.download-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(0,0,0,0.15);
}
.download-btn svg {
    width: 1.25rem;
    height: 1.25rem;
}
</style>

<div id="rapor-content">
    <!-- Data Siswa -->
    <div class="page relative" id="data-siswa-page">
        <!-- Background Logo -->
        <div class="absolute inset-0 flex items-center justify-center opacity-10 pointer-events-none">
            <img src="{{ asset('images/logopembut.png') }}" alt="Logo Sekolah" class="w-96" crossorigin="anonymous">
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
    <div class="download-buttons">
        <button onclick="downloadPageAsPNG('data-siswa-page')" class="download-btn bg-blue-500 hover:bg-blue-600 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
            Download PNG
        </button>
        <button onclick="downloadPageAsPDF('data-siswa-page')" class="download-btn bg-red-500 hover:bg-red-600 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
            Download PDF
        </button>
    </div>

    <!-- Nilai Akademik -->
    <div class="page relative" id="nilai-akademik-page">
        <!-- Background Logo -->
        <div class="absolute inset-0 flex items-center justify-center opacity-10 pointer-events-none">
            <img src="{{ asset('images/logopembut.png') }}" alt="Logo Sekolah" class="w-96" crossorigin="anonymous">
        </div>

        <div class="text-center mb-8 relative">
            <h1 class="text-2xl font-bold">NILAI AKADEMIK</h1>
            <h2 class="text-xl">Tahun Ajaran {{ now()->year }}/{{ now()->year + 1 }}</h2>
        </div>

        <div class="overflow-x-auto rounded-xl border border-gray-100 bg-white">
            <table class="min-w-full divide-y divide-gray-100">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">No</th>
                        <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">Mata Pelajaran</th>
                        <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">UTS</th>
                        <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-nowrap">UAS</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @php
                    $nilaiSiswa = \App\Models\Nilaisiswa::where('nis', $murid->nis)->get();
                    $no = 1;
                @endphp
                @forelse($nilaiSiswa as $nilai)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-500">{{ $no++ }}</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $nilai->nama_mapel }}</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $nilai->uts }}</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">{{ $nilai->uas }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-3 sm:px-6 py-3 sm:py-4 text-center text-sm text-gray-500">
                            Tidak ada data nilai
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="download-buttons">
        <button onclick="downloadPageAsPNG('nilai-akademik-page')" class="download-btn bg-blue-500 hover:bg-blue-600 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
            Download PNG
        </button>
        <button onclick="downloadPageAsPDF('nilai-akademik-page')" class="download-btn bg-red-500 hover:bg-red-600 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
            Download PDF
        </button>
    </div>

    <!-- Kehadiran -->
    <div class="page relative" id="kehadiran-page">
        <!-- Background Logo -->
        <div class="absolute inset-0 flex items-center justify-center opacity-10 pointer-events-none">
            <img src="{{ asset('images/logopembut.png') }}" alt="Logo Sekolah" class="w-96" crossorigin="anonymous">
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
<div class="download-buttons">
    <button onclick="downloadPageAsPNG('kehadiran-page')" class="download-btn bg-blue-500 hover:bg-blue-600 text-white">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
        </svg>
        Download PNG
    </button>
    <button onclick="downloadPageAsPDF('kehadiran-page')" class="download-btn bg-red-500 hover:bg-red-600 text-white">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
        </svg>
        Download PDF
    </button>
</div>

<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
function downloadPageAsPNG(pageId) {
    const element = document.getElementById(pageId);
    html2canvas(element, {
        scale: 2,
        useCORS: true,
        logging: true,
        allowTaint: true
    }).then(canvas => {
        const link = document.createElement('a');
        link.download = pageId + '.png';
        link.href = canvas.toDataURL('image/png');
        link.click();
    });
}

function downloadPageAsPDF(pageId) {
    const { jsPDF } = window.jspdf;
    const element = document.getElementById(pageId);
    
    html2canvas(element, {
        scale: 2,
        useCORS: true,
        logging: true,
        allowTaint: true
    }).then(canvas => {
        const imgData = canvas.toDataURL('image/png');
        const pdf = new jsPDF('p', 'mm', 'a4');
        const imgProps = pdf.getImageProperties(imgData);
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;
        
        pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
        pdf.save(pageId + '.pdf');
    });
}
</script>

@endsection
