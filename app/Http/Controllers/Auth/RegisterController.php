<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin;
use App\Models\Guru;
use App\Models\Murid; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required|string|unique:users,nip',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3|confirmed',
            'role' => 'required|string|in:murid,guru,wali,admin'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::beginTransaction();

            // Create user with both nip and nis
            $userData = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'nip' => null,
                'nis' => null
            ];

            // Set nip/nis based on role
            if ($request->role === 'murid') {
                $userData['nis'] = $request->nip;
            } else {
                $userData['nip'] = $request->nip;
            }

            $user = User::create($userData);

            // Create role-specific record
            switch($request->role) {
                case 'admin':
                    Admin::create([
                        'nip' => $request->nip,
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password)
                    ]);
                    break;

                case 'guru':
                case 'wali':
                    Guru::create([
                        'nip' => $request->nip,
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'is_wali' => $request->role === 'wali',
                        'birth_place' => '',
                        'birth_date' => now(),
                        'address' => '',
                        'phone_number' => '',
                        'photo' => '',
                        'gender' => 'L', // Set default gender to avoid truncation error
                        'role' => $request->role
                    ]);
                    break;

                case 'murid':
                    Murid::create([
                        'nis' => $request->nip,
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password)
                    ]);
                    break;
            }

            DB::commit();

            auth()->login($user);

            return redirect('/')->with('success', 'Registration successful!');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()
                ->back()
                ->with('error', 'Registration failed: ' . $e->getMessage())
                ->withInput();
        }
    }
}
