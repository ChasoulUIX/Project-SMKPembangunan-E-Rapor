<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Murid;
use App\Models\Kelas;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MuridsImport;

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
            // Handle file upload manually since Excel facade is not available
            $file = $request->file('file');
            $path = $file->store('temp');
            
            // You'll need to implement your own Excel import logic here
            // For now, return with a message
            return redirect()->back()->with('error', 'Excel import functionality is not available. Please install maatwebsite/excel package first.');
            
        } catch (\Exception $e) {
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

        $murid = Murid::findOrFail($id);
        $murid->update($request->all());

        return redirect()->route('admin.pages.importsiswa')->with('success', 'Data siswa berhasil diupdate');
    }

    public function destroy($id)
    {
        $murid = Murid::findOrFail($id);
        $murid->delete();

        return redirect()->route('admin.pages.importsiswa')->with('success', 'Data siswa berhasil dihapus');
    }
}
