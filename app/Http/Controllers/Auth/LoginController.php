<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Guru;
use App\Models\Murid;
use App\Models\Wali;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nip' => 'required',
            'password' => 'required'
        ]);

        // Check in Admin table
        $admin = Admin::where('nip', $credentials['nip'])->first();
        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            Auth::login($admin);
            return redirect('/admin/dashboard');
        }

        // Check in Guru table
        $guru = Guru::where('nip', $credentials['nip'])->first();
        if ($guru && Hash::check($credentials['password'], $guru->password)) {
            Auth::login($guru);
            return redirect('/guru/dashboard');
        }

        // Check in Murid table using NIS
        $murid = Murid::where('nis', $credentials['nip'])->first();
        if ($murid && Hash::check($credentials['password'], $murid->password)) {
            Auth::login($murid);
            return redirect('/murid/dashboard');
        }

        // Check in Wali table using ID
        $wali = Wali::where('id', $credentials['nip'])->first();
        if ($wali && Hash::check($credentials['password'], $wali->password)) {
            Auth::login($wali);
            return redirect('/wali/dashboard');
        }

        return back()->with('status', 'Nomor induk atau password salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
}
