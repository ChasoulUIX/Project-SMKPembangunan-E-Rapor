<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Guru;
use App\Models\Murid;
use App\Models\User;
use App\Models\Wali;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'nip' => 'required',
            'password' => 'required'
        ]);

        // Find user in respective tables based on nip/nis
        $admin = Admin::where('nip', $credentials['nip'])->first();
        $guru = Guru::where('nip', $credentials['nip'])->first();
        $murid = Murid::where('nis', $credentials['nip'])->first();

        // Find corresponding user record
        $user = null;
        $userData = null;

        if ($admin) {
            $userData = $admin;
            $user = User::where('nip', $userData->nip)->first();
        } elseif ($guru) {
            $userData = $guru;
            $user = User::where('nip', $userData->nip)->first();
        } elseif ($wali = Wali::where('nip', $credentials['nip'])->first()) {
            $userData = $wali;
            $user = User::where('nip', $userData->nip)->first();
        } elseif ($murid) {
            $userData = $murid;
            $user = User::where('nis', $userData->nis)->first();
        }

        if (!$user || !$userData) {
            return back()
                ->withInput($request->only('nip'))
                ->with('error', 'Nomor induk tidak ditemukan!');
        }

        if (!Hash::check($credentials['password'], $userData->password)) {
            return back()
                ->withInput($request->only('nip'))
                ->with('error', 'Password salah!');
        }

        // Login based on role
        $loginSuccess = false;
        
        switch($user->role) {
            case 'admin':
                $loginSuccess = Auth::guard('web')->loginUsingId($user->id);
                break;
            case 'guru':
                $loginSuccess = Auth::guard('web')->loginUsingId($user->id);
                break;
            case 'wali':
                $loginSuccess = Auth::guard('web')->loginUsingId($user->id);
                break;
            case 'murid':
                $loginSuccess = Auth::guard('web')->loginUsingId($user->id);
                break;
        }

        if ($loginSuccess) {
            $request->session()->regenerate();
            return redirect('/' . $user->role . '/dashboard')->with('success', 'Login berhasil!');
        }

        return back()
            ->withInput($request->only('nip'))
            ->with('error', 'Login gagal!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Berhasil logout!');
    }

    public function showLoginForm()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return redirect('/' . $user->role . '/dashboard');
        }

        return view('auth.login');
    }
}
