<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Menampilkan daftar user (Gambar 1)
     */
    public function index()
    {
        return view('admin.users', [
            'users' => User::all()
        ]);
    }

    /**
     * Menampilkan form tambah user (Gambar 2)
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Menyimpan user baru ke database (Gambar 2)
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Menghapus user (Gambar terakhir yang kamu kirim)
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    // Tampilkan form edit
public function edit($id)
{
    $user = User::findOrFail($id);
    return view('admin.edit', compact('user'));
}

// Simpan perubahan
public function update(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    return redirect()->route('users.index')->with('success', 'User updated successfully.');
}
}