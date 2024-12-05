<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use App\Models\Nilaisiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WaliNilaiSiswaController extends Controller
{
    public function index()
    {
        $nilaiSiswa = Nilaisiswa::all();
        return view('wali.pages.nilaisiswa', compact('nilaiSiswa'));
    }

    public function show($id)
    {
        $nilai = Nilaisiswa::findOrFail($id);
        return view('wali.pages.nilaisiswa-detail', compact('nilai'));
    }
}
