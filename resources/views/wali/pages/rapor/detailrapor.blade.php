@extends('wali.layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <link href="https://fonts.googleapis.com/css2?family=Arial&display=swap" rel="stylesheet">

    <style>
        @page {
            size: A4;
        }

        body {
            font-family: 'Arial', sans-serif;
            font-size: 12px;
        }

        .page {
            width: 215mm;
            height: 330mm;
            padding: 20mm;
            margin: 10mm auto;
            background: white;
            box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
            page-break-after: always;
            position: relative;
        }

        .rapot-header {
            width: 100%;
            margin-bottom: 10px;
        }

        .rapot-header table {
            width: 100%;
            border-collapse: collapse;
        }

        .rapot-header td {
            padding: 3px;
        }

        .label {
            width: 150px;
        }

        .nilai-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0 20px;
        }

        .nilai-table th,
        .nilai-table td {
            border: 1px solid #333;
            padding: 8px;
        }

        .nilai-table thead tr {
            background-color: rgb(217, 217, 217);
        }

        .nilai-table th:nth-child(2),
        .nilai-table td:nth-child(2) {
            width: 30%;
        }

        .ekskul-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0 50px;
        }

        .ekskul-table th,
        .ekskul-table td {
            border: 1px solid #333;
            padding: 8px;
        }

        .ekskul-table thead tr {
            background-color: rgb(217, 217, 217);
        }

        .footer {
            position: absolute;
            bottom: 20mm;
            left: 20mm;
            right: 20mm;
            display: flex;
            justify-content: space-between;
            font-size: 10px;
            padding: 0 10px;
        }

        .ketidakhadiran-table {
            width: 50%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .ketidakhadiran-table td {
            border: 1px solid black;
            padding: 8px;
        }

        .ketidakhadiran-table thead tr {
            background-color: rgb(217, 217, 217);
        }

        .tanda-tangan {
            margin: 50px 100px;
        }

        .tanda-tangan-wrapper {
            display: flex;
            justify-content: space-between;
            text-align: center;
            margin-bottom: 30px;
        }

        .tanda-tangan-kepsek {
            text-align: center;
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
        <!-- Halaman 1 -->
        <div class="page" id="nilai-akademik-page">
            <div class="rapot-header">
                <table>
                    <tr>
                        <td class="label"><b>Nama Peserta Didik</b></td>
                        <td>: {{ $murid->name }}</td>
                        <td class="label"><b>Kelas</b></td>
                        <td>: {{ $murid->class }}</td>
                    </tr>
                    <tr>
                        <td><b>NIS/NISN</b></td>
                        <td>: {{ $murid->nis }}/{{ $murid->nisn }}</td>
                        <td><b>Fase</b></td>
                        <td>: E</td>
                    </tr>
                    <tr>
                        <td><b>Sekolah</b></td>
                        <td>: SMK Pengembangan Bogor</td>
                        <td><b>Semester</b></td>
                        <td>: {{ now()->month >= 6 && now()->month <= 12 ? 'Ganjil' : 'Genap' }}</td>
                    </tr>
                    <tr>
                        <td><b>Alamat</b></td>
                        <td>: {{ $murid->address }}</td>
                        <td><b>Tahun Pelajaran</b></td>
                        <td>: {{ now()->year }}/{{ now()->year + 1 }}</td>
                    </tr>
                </table>
            </div>

            <table class="nilai-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Mata Pelajaran</th>
                        <th>Nilai Akhir</th>
                        <th>Capaian Kompetensi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $nilaiSiswa = \App\Models\Nilaisiswa::where('nis', $murid->nis)
                            ->join(
                                'matapelajarans',
                                DB::raw('BINARY nilai_siswa.nama_mapel'),
                                '=',
                                DB::raw('BINARY matapelajarans.nama_mapel'),
                            )
                            ->select('nilai_siswa.*', 'matapelajarans.kategori')
                            ->orderBy('matapelajarans.kategori')
                            ->get()
                            ->groupBy('kategori');

                        $no = 1;
                        $alphabet = 'A';
                        $prevAlphabet = '';
                    @endphp

                    @foreach ($nilaiSiswa as $kategori => $nilai_list)
                        @if($alphabet != $prevAlphabet && $prevAlphabet != '')
                            <tr class="separator-row" style="height:20px">
                                <td style="border-left:1px solid #000; border-right:1px solid #000;padding:0">&nbsp;</td>
                                <td style="border-right:1px solid #000;padding:0">&nbsp;</td>
                                <td style="border-right:1px solid #000;padding:0">&nbsp;</td>
                                <td style="border-right:1px solid #000;padding:0">&nbsp;</td>
                            </tr>
                        @endif

                        <tr>
                            <td><b>{{ $alphabet == 'C' ? '' : $alphabet . '.' }}</b></td>
                            <td><b>{{ $alphabet == 'C' ? 'Muatan' : 'Kelompok' }} {{ ucwords(strtolower($kategori)) }}</b></td>
                            <td></td>
                            <td></td>
                        </tr>

                        @foreach ($nilai_list as $nilai)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $nilai->nama_mapel }}</td>
                                <td>{{ $nilai->nilai_rapor }}</td>
                                <td>
                                    @php
                                        $materiValues = [
                                            ['name' => $nilai->nama_materi_1, 'value' => $nilai->materi_1],
                                            ['name' => $nilai->nama_materi_2, 'value' => $nilai->materi_2],
                                            ['name' => $nilai->nama_materi_3, 'value' => $nilai->materi_3],
                                            ['name' => $nilai->nama_materi_4, 'value' => $nilai->materi_4],
                                            ['name' => $nilai->nama_materi_5, 'value' => $nilai->materi_5],
                                        ];

                                        $lowestScore = PHP_FLOAT_MAX;
                                        $highestScore = 0;
                                        $lowestMateri = '';
                                        $highestMateri = '';

                                        foreach ($materiValues as $materi) {
                                            if ($materi['value'] < $lowestScore && $materi['value'] > 0) {
                                                $lowestScore = $materi['value'];
                                                $lowestMateri = $materi['name'];
                                            }
                                            if ($materi['value'] > $highestScore) {
                                                $highestScore = $materi['value'];
                                                $highestMateri = $materi['name'];
                                            }
                                        }
                                    @endphp

                                    @if ($nilai->nilai_rapor >= 90)
                                        Sangat Baik dalam memahami dan menerapkan konsep {{ $nilai->nama_mapel }}.
                                        Pencapaian tertinggi pada materi {{ $highestMateri }} dan terendah pada materi
                                        {{ $lowestMateri }}
                                    @elseif($nilai->nilai_rapor >= 80)
                                        Baik dalam memahami dan menerapkan konsep {{ $nilai->nama_mapel }}.
                                        Pencapaian tertinggi pada materi {{ $highestMateri }} dan terendah pada materi
                                        {{ $lowestMateri }}
                                    @elseif($nilai->nilai_rapor >= 70)
                                        Cukup dalam memahami konsep {{ $nilai->nama_mapel }}.
                                        Pencapaian tertinggi pada materi {{ $highestMateri }} dan terendah pada materi
                                        {{ $lowestMateri }}
                                    @else
                                        Perlu bimbingan dalam memahami konsep {{ $nilai->nama_mapel }}.
                                        Pencapaian tertinggi pada materi {{ $highestMateri }} dan terendah pada materi
                                        {{ $lowestMateri }}
                                    @endif
                                </td>
                            </tr>
                            
                        @endforeach
                        @php
                            $prevAlphabet = $alphabet;
                            $alphabet++;
                        @endphp
                    @endforeach

                    @if ($nilaiSiswa->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data nilai</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <table class="ekskul-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Ekstrakulikuler</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <div class="footer">
                <span><i>{{ $murid->name }}</i></span>
                <span>-1-</span>
                <span>{{ $murid->class }}/{{ now()->month >= 6 && now()->month <= 12 ? 'Ganjil' : 'Genap' }}
                    {{ now()->year }}/{{ now()->year + 1 }}</span>
            </div>
        </div>

        <div class="download-buttons">
            <button onclick="downloadPageAsPNG('nilai-akademik-page')"
                class="download-btn bg-blue-500 hover:bg-blue-600 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                Download PNG
            </button>
            <button onclick="downloadPageAsPDF('nilai-akademik-page')"
                class="download-btn bg-red-500 hover:bg-red-600 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                Download PDF
            </button>
        </div>

        <!-- Halaman 2 -->
        <div class="page" id="kehadiran-page">
            <table class="ketidakhadiran-table">
                <tr style="background-color: rgb(217, 217, 217);">
                    <td colspan="2" style="text-align: center;"><b>Ketidakhadiran</b></td>
                </tr>
                <tr>
                    <td>Sakit</td>
                    <td>: {{ $murid->kehadiran['sakit'] ?? 0 }} hari</td>
                </tr>
                <tr>
                    <td>Izin</td>
                    <td>: {{ $murid->kehadiran['izin'] ?? 0 }} hari</td>
                </tr>
                <tr>
                    <td>Tanpa Keterangan</td>
                    <td>: {{ $murid->kehadiran['alpha'] ?? 0 }} hari</td>
                </tr>
            </table>

            <div class="tanda-tangan">
                <div class="tanda-tangan-wrapper">
                    <div>
                        <p>Mengetahui,<br>Orang Tua/Wali,</p>
                        <br><br><br><br><br>
                        <p>…………………………..</p>
                    </div>
                    <div>
                        <p>Bogor, {{ now()->format('d F Y') }}<br>Wali Kelas</p>
                        <br><br><br><br><br>
                        <p>…………………………..</p>
                    </div>
                </div>

                <div class="tanda-tangan-kepsek">
                    <p>Mengetahui,<br>Kepala Sekolah</p>
                    <br><br><br><br><br>
                    <p><b>Erni Rohmawati, M.Pd.</b></p>
                </div>
            </div>

            <div class="footer">
                <span><i>{{ $murid->name }}</i></span>
                <span>-2-</span>
                <span>{{ $murid->class }}/{{ now()->month >= 6 && now()->month <= 12 ? 'Ganjil' : 'Genap' }}
                    {{ now()->year }}/{{ now()->year + 1 }}</span>
            </div>
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
            const pdf = new jsPDF({
                orientation: 'portrait',
                unit: 'mm',
                format: [215, 330]  // Custom size untuk F4/Folio
            });
            const imgProps = pdf.getImageProperties(imgData);
            const pdfWidth = pdf.internal.pageSize.getWidth();
            const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;
            
            pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
            pdf.save(pageId + '.pdf');
        });
    }
    </script>
@endsection