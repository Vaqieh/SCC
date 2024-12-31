<?php
namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    // Menampilkan Profil Berdasarkan Role
    public function showProfile()
    {
        $user = Auth::user(); // Ambil data pengguna yang sedang login

        // Ambil data profil admin
        if ($user->role == 'admin') {
            $profile = Admin::where('email', $user->email)->first(); // Ambil profil admin
            return view('profil.profiladmin', compact('user', 'profile'));
        } else {
            return redirect()->route('home')->with('error', 'Role tidak valid');
        }
    }

    // Mengupdate Profil Berdasarkan Role
    public function updateProfile(Request $request)
    {
        $user = Auth::user(); // Ambil data pengguna yang sedang login

        // Validasi data input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins,email,' . $user->id, // Unique berdasarkan tabel admins
            'phone_number' => 'nullable|string|max:15',
        ]);

        // Cari profil admin berdasarkan email
        $profile = Admin::where('email', $user->email)->first(); // Ambil profil admin

        if ($profile) {
            // Update profil admin (tanpa password)
            $profile->admin_nama = $validatedData['name'];
            $profile->admin_nohp = $validatedData['phone_number'];

            // Isi login_history dengan nilai default
            $profile->login_history = now(); // Atau bisa NULL
            $profile->save(); // Simpan perubahan ke tabel admins
        } else {
            // Jika profil admin tidak ditemukan, buat profil baru
            $profile = new Admin();
            $profile->email = $user->email;
            $profile->admin_nama = $validatedData['name'];
            $profile->admin_nohp = $validatedData['phone_number'];

            // Isi login_history dengan nilai default
            $profile->login_history = now();
            $profile->logout_history = now(); // Atau NULL
            $profile->save();  // Simpan data baru ke tabel admins
        }

        // Kembalikan ke tampilan profil admin dengan data terbaru
        return view('profil.profiladmin', compact('user', 'profile'));
    }
}
