<?php

namespace App\Http\Controllers\Guru;

use App\Models\MateriPelajaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MateriPelajaranController extends Controller
{
    public function index()
    {
        return view('guru.pages.materi');
    }

    public function show($mapel)
    {
        $materi = MateriPelajaran::where('nama_guru', auth()->user()->name)
            ->where('nama_mapel', $mapel)
            ->first();
            
        return response()->json($materi);
    }

    public function store(Request $request)
    {
        $materi = MateriPelajaran::updateOrCreate(
            [
                'nama_guru' => $request->nama_guru,
                'nama_mapel' => $request->nama_mapel,
            ],
            [
                'materi_1' => $request->materi_1,
                'materi_2' => $request->materi_2,
                'materi_3' => $request->materi_3,
                'materi_4' => $request->materi_4,
                'materi_5' => $request->materi_5,
            ]
        );

        return redirect()->back()->with('success', 'Nama materi berhasil disimpan');
    }
}