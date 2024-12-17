<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Murid;
use App\Models\User;
use App\Models\Kelas;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ImportSiswaController extends Controller
{
    public function index()
    {
        $murids = Murid::with('kelas')->get();
        return view('admin.pages.importsiswa', compact('murids'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        try {
            DB::beginTransaction();

            Excel::import(new class implements ToModel, WithStartRow {
                public function startRow(): int
                {
                    return 2; // Skip header row
                }

                public function model(array $row)
                {
                    Log::info('Row data:', $row);
                    
                    if (empty($row)) {
                        Log::warning('Empty row detected');
                        return null;
                    }

                    if (!isset($row[1])) {
                        Log::warning('NIS column not found');
                        return null;
                    }

                    if (trim($row[1]) === '') {
                        Log::warning('Empty NIS value');
                        return null;
                    }

                    // Check remaining required fields
                    $requiredFields = [
                        1 => 'NIS',
                        2 => 'Nama',
                        3 => 'NISN', 
                        4 => 'Tempat Lahir',
                        5 => 'Jenis Kelamin'
                    ];

                    foreach ($requiredFields as $index => $fieldName) {
                        if (!isset($row[$index]) || trim($row[$index]) === '') {
                            throw new \Exception("Kolom {$fieldName} tidak boleh kosong pada baris data");
                        }
                    }

                    // Validate gender value
                    $gender = strtoupper(trim($row[5]));
                    if (!in_array($gender, ['L', 'P'])) {
                        throw new \Exception('Jenis kelamin harus L atau P. Data yang dimasukkan: ' . $gender);
                    }

                    $nis = trim($row[1]);
                    $email = $nis . '@gmail.com';
                    $password = Hash::make($nis);

                    // Create user first
                    $user = User::create([
                        'name' => trim($row[2]),
                        'email' => $email,
                        'password' => $password,
                        'nis' => $nis,
                        'role' => 'murid'
                    ]);
                    
                    // Create murid record
                    return new Murid([
                        'nis' => $nis,
                        'name' => trim($row[2]), 
                        'nisn' => trim($row[3]),
                        'birth_place' => trim($row[4]),
                        'birth_date' => Carbon::now()->format('Y-m-d'),
                        'gender' => $gender,
                        'email' => $email,
                        'password' => $password,
                        'address' => trim($row[9]),
                        'phone_number' => trim($row[10]),
                        'father_name' => trim($row[14]),
                        'mother_name' => trim($row[15]),
                        'parent_phone' => trim($row[17]),
                        'parent_address' => trim($row[16]),
                        'class' => trim($row[12]),
                        'major' => 'tidak ada',
                        'academic_year' => date('Y'),
                        'semester' => '1',
                        'photo' => '',
                        'role' => 'murid'
                    ]);
                }
            }, $request->file('file'));

            DB::commit();
            return redirect()->back()->with('success', 'Data berhasil diimport!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.pages.importsiswa.create', compact('kelas'));
    }

    public function show($id)
    {
        $murid = Murid::with('kelas')->findOrFail($id);
        return view('admin.pages.importsiswa.show', compact('murid'));
    }

    public function edit($id)
    {
        $murid = Murid::findOrFail($id);
        $kelas = Kelas::all();
        return view('admin.pages.importsiswa.edit', compact('murid', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required|unique:murids,nis,' . $id,
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'kelas_id' => 'required|exists:kelas,id'
        ]);

        try {
            DB::beginTransaction();

            $murid = Murid::findOrFail($id);
            $murid->update($request->all());

            // Update corresponding user record
            User::where('nis', $murid->nis)->update([
                'name' => $request->nama,
                'email' => $murid->email
            ]);

            DB::commit();
            return redirect()->route('admin.pages.importsiswa')->with('success', 'Data siswa berhasil diupdate');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $murid = Murid::findOrFail($id);
            // Delete corresponding user record
            User::where('nis', $murid->nis)->delete();
            $murid->delete();

            DB::commit();
            return redirect()->route('admin.pages.importsiswa')->with('success', 'Data siswa berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
