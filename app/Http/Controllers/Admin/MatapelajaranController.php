<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matapelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MatapelajaranController extends Controller
{
    public function index()
    {
        $matapelajarans = Matapelajaran::select('id', 'kode_mapel', 'nama_mapel', 'nama_guru', 'daftar_siswa')
            ->orderBy('kode_mapel')
            ->get();
        return view('admin.pages.matapelajaran', compact('matapelajarans'));
    }

    public function show(Matapelajaran $matapelajaran)
    {
        return view('admin.pages.matapelajaran.show', compact('matapelajaran'));
    }

    public function create()
    {
        return view('admin.pages.matapelajaran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_mapel' => 'required|unique:matapelajarans',
            'nama_mapel' => 'required',
            'nama_guru' => 'required',
            'nip' => 'required',
            'kategori' => 'required',
            'daftar_siswa' => 'nullable'
        ]);

        // Remove unique validation for nip since a teacher can have multiple subjects
        Matapelajaran::create([
            'kode_mapel' => $validated['kode_mapel'],
            'nama_mapel' => $validated['nama_mapel'], 
            'nama_guru' => $validated['nama_guru'],
            'nip' => $validated['nip'],
            'kategori' => $validated['kategori'],
            'daftar_siswa' => $validated['daftar_siswa'] ?? null
        ]);

        return redirect()->route('admin.pages.matapelajaran')->with('success', 'Mata pelajaran berhasil ditambahkan');
    }

    public function edit($id)
    {
        try {
            // Log untuk debugging
            Log::info('Accessing edit method with ID: ' . $id);
            
            // Cari data matapelajaran
            $matapelajaran = Matapelajaran::find($id);
            
            // Cek apakah data ditemukan
            if (!$matapelajaran) {
                Log::warning('Matapelajaran not found with ID: ' . $id);
                return response()->json([
                    'success' => false,
                    'message' => 'Mata pelajaran tidak ditemukan'
                ], 404);
            }

            // Log data yang ditemukan
            Log::info('Matapelajaran found:', $matapelajaran->toArray());

            // Return response sukses
            return response()->json([
                'success' => true,
                'matapelajaran' => $matapelajaran
            ]);

        } catch (\Exception $e) {
            // Log error
            Log::error('Error in MatapelajaranController@edit: ' . $e->getMessage());
            Log::error($e->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan internal server'
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $matapelajaran = Matapelajaran::findOrFail($id);
            
            $matapelajaran->update([
                'nama_mapel' => $request->nama_mapel,
                'kategori' => $request->kategori,
                'nip' => $request->nip,
                'nama_guru' => $request->nama_guru
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data mata pelajaran berhasil diperbarui'
            ]);

        } catch (\Exception $e) {
            Log::error('Error updating matapelajaran: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui data mata pelajaran'
            ], 500);
        }
    }

    public function destroy(Matapelajaran $matapelajaran)
    {
        $matapelajaran->delete();

        return redirect()->route('admin.pages.matapelajaran')->with('success', 'Mata pelajaran berhasil dihapus');
    }
}
