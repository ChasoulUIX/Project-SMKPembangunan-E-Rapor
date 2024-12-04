<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wali;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class WaliController extends Controller
{
    public function index()
    {
        $walis = Wali::all();
        return view('admin.pages.wali', compact('walis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:walis',
            'name' => 'required'
        ]);

        // Find existing user with matching NIP
        $existingUser = User::where('nip', $request->nip)->first();

        // Update role in gurus table
        \App\Models\Guru::where('nip', $request->nip)->update([
            'role' => 'wali'
        ]);

        if ($existingUser) {
            // Update existing user's role to include wali
            $existingUser->update([
                'role' => 'wali',
                'updated_at' => Carbon::now()
            ]);

            // Create wali record linked to existing user
            Wali::create([
                'user_id' => $existingUser->id,
                'nip' => $request->nip,
                'name' => $request->name,
                'email' => $existingUser->email,
                'password' => $existingUser->password,
                'role' => 'wali',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

        } else {
            // Generate email from NIP if no existing user
            $email = $request->nip . '@smkpembangunanbogor.sch.id';
            $defaultPassword = bcrypt('password123');

            // Create new user
            $user = User::create([
                'name' => $request->name,
                'nip' => $request->nip,
                'email' => $email,
                'password' => $defaultPassword,
                'role' => 'wali',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            // Create wali record
            Wali::create([
                'user_id' => $user->id,
                'nip' => $request->nip,
                'name' => $request->name,
                'email' => $email,
                'password' => $defaultPassword,
                'role' => 'wali',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        return redirect()->back()->with('success', 'Wali kelas berhasil ditambahkan');
    }

    public function show($id)
    {
        $wali = Wali::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $wali
        ]);
    }

    public function update(Request $request, $id)
    {
        $wali = Wali::findOrFail($id);

        $request->validate([
            'nip' => 'required|unique:walis,nip,'.$id,
            'name' => 'required',
            'email' => 'required|email|unique:walis,email,'.$id.'|unique:users,email,'.$wali->user_id,
        ]);

        $data = [
            'nip' => $request->nip,
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => Carbon::now()
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
            // Update password in users table too
            User::where('id', $wali->user_id)->update([
                'password' => Hash::make($request->password)
            ]);
        }

        // Update user data
        User::where('id', $wali->user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => Carbon::now()
        ]);

        $wali->update($data);

        return redirect()->back()->with('success', 'Wali kelas berhasil diperbarui');
    }

    public function destroy($id)
    {
        $wali = Wali::findOrFail($id);
        // Delete associated user
        User::where('id', $wali->user_id)->delete();
        $wali->delete();

        return redirect()->back()->with('success', 'Wali kelas berhasil dihapus');
    }
}
