<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminKelolaLowonganController extends Controller
{
    public function index()
    {
        // $admins = Admin::all();
        // return view('admin.KelolaLowongan', compact('admins'));
    }

    // Menampilkan form tambah admin
    public function create()
    {
        return view('admin.create');
    }

    // Menyimpan data admin baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'admin_nama' => 'required|string|max:255',
            'admin_nohp' => 'required|string|max:13',
            'email' => 'required|email|unique:admins,email',
            'password_admin' => 'required|string|min:8|confirmed',
        ]);

        Admin::create([
            'admin_id' => uniqid(),
            'admin_nama' => $validated['admin_nama'],
            'admin_nohp' => $validated['admin_nohp'],
            'email' => $validated['email'],
            'password_admin' => Hash::make($validated['password_admin']),
        ]);

        return redirect()->route('admin.index')->with('success', 'Admin berhasil ditambahkan');
    }

    // Menampilkan form edit admin
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.edit', compact('admin'));
    }

    // Mengupdate data admin
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'admin_nama' => 'required|string|max:255',
            'admin_nohp' => 'required|string|max:13|unique:admins,admin_nohp,' . $id . ',admin_id',
            'email' => 'required|email|unique:admins,email,' . $id . ',admin_id',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->update($validated);

        return redirect()->route('admin.index')->with('success', 'Admin berhasil diperbarui');
    }

    // Menghapus data admin
    public function destroy($id)
    {
        Admin::findOrFail($id)->delete();
        return redirect()->route('admin.index')->with('success', 'Admin berhasil dihapus');
    }
}
