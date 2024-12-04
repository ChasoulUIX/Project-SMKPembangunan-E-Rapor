<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use App\Models\Daftarsiswa;
use App\Models\Murid;
use App\Models\Daftarnilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;

class WaliRaporController extends Controller
{
    public function index()
    {
        return view('wali.pages.rapor');
    }

    public function detail($nis)
    {
        $murid = Murid::where('nis', $nis)->firstOrFail();
        $daftarSiswa = Daftarsiswa::where('nip', Auth::user()->nip)
            ->whereJsonContains('daftar_siswa', ['nis' => $nis])
            ->firstOrFail();

        // Get student data
        $studentData = collect($daftarSiswa->daftar_siswa)->firstWhere('nis', $nis);
        
        // Map data to match view requirements
        $murid->name = $studentData['name'];
        $murid->class = $daftarSiswa->nama_kelas;
        $murid->major = $daftarSiswa->jurusan;
        $murid->semester = 'Genap'; // You may want to make this dynamic
        $murid->father_name = $studentData['father_name'] ?? '-';
        $murid->kehadiran = [
            'sakit' => $studentData['kehadiran']['sakit'] ?? 0,
            'izin' => $studentData['kehadiran']['izin'] ?? 0,
            'alpha' => $studentData['kehadiran']['alpha'] ?? 0
        ];

        return view('wali.pages.rapor.detailrapor', compact('murid'));
    }

    public function downloadPDF(Request $request)
    {
        $fileName = 'rapor-' . time() . '.pdf';
        $filePath = public_path('storage/rapor/' . $fileName);

        // Create directory if it doesn't exist
        if (!file_exists(public_path('storage/rapor'))) {
            mkdir(public_path('storage/rapor'), 0777, true);
        }

        // Save file from request
        if ($request->hasFile('pdf_file')) {
            $request->file('pdf_file')->move(public_path('storage/rapor'), $fileName);
        }

        // Return file download response
        if (file_exists($filePath)) {
            return Response::download($filePath, $fileName, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $fileName . '"'
            ])->deleteFileAfterSend(true);
        }

        return back()->with('error', 'File not found!');
    }

    public function downloadImage(Request $request)
    {
        $fileName = 'rapor-' . time() . '.png';
        $filePath = public_path('storage/rapor/' . $fileName);

        // Create directory if it doesn't exist  
        if (!file_exists(public_path('storage/rapor'))) {
            mkdir(public_path('storage/rapor'), 0777, true);
        }

        // Save file from request
        if ($request->hasFile('image_file')) {
            $request->file('image_file')->move(public_path('storage/rapor'), $fileName);
        }

        // Return file download response
        if (file_exists($filePath)) {
            return Response::download($filePath, $fileName, [
                'Content-Type' => 'image/png',
                'Content-Disposition' => 'attachment; filename="' . $fileName . '"'
            ])->deleteFileAfterSend(true);
        }

        return back()->with('error', 'File not found!');
    }
}
