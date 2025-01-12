<?php
namespace App\Http\Controllers;

use App\Models\KelolaPerusahaan;
use App\Models\Lowongan;
use App\Models\PanggilanTes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PerusahaanKelolaPanggilanTesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data Panggilan Tes dengan pagination
        if (request()->filled('q')) {
            $data['perusahaankelolapanggilantes'] = PanggilanTes::search(request('q'))->paginate(10);
        } else {
            $data['perusahaankelolapanggilantes'] = PanggilanTes::latest()->paginate(10);
        }
        return view('perusahaan.PerusahaanPanggilanTestIndex', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil data perusahaan yang email dan nama-nya sesuai dengan yang sedang login
        $perusahaan = KelolaPerusahaan::where('email_perusahaan', $user->email)
            ->orWhere('p_nama', $user->name)
            ->first();

        // Jika perusahaan tidak ditemukan
        if (!$perusahaan) {
            // Mengarahkan kembali dengan pesan error
            session()->flash('error', 'Profil perusahaan belum lengkap. Mohon lengkapi profil Anda untuk melanjutkan.');
            return back();
        }

        // Ambil daftar lowongan yang terkait dengan perusahaan yang sedang login
        $data['listLowongan'] = Lowongan::where('perusahaan_id', $perusahaan->id)
            ->orderBy('nama_lowongan', 'asc')
            ->get();

        // Ambil daftar admin yang terkait (admin dari tabel users)
        $data['listAdmin'] = User::where('role', 'admin')
            ->orderBy('name', 'asc')
            ->get();

        // Mengirimkan data perusahaan ke view
        $data['perusahaan'] = $perusahaan;

        return view('perusahaan.PerusahaanPanggilanTesCreate', $data);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi data dari form
    $requestData = $request->validate([
        'lowongan_id' => 'required|exists:lowongans,id',  // Pastikan lowongan ada
        'perusahaan_id' => 'required|exists:kelola_perusahaans,id',  // Pastikan perusahaan ada
        'admin_id' => 'nullable|exists:users,id',  // Admin ID boleh kosong, dan jika ada harus valid
        'nama' => 'required|string|max:255',  // Nama panggilan tes wajib
        'tanggal_pt' => 'required|date',  // Tanggal panggilan tes wajib
        'status' => 'required|in:dibuka,ditutup',  // Status harus di antara 'dibuka' dan 'ditutup'
    ]);

    // Proses dan simpan data ke database
    $panggilantes = new PanggilanTes();

    // Isi data ke model
    $panggilantes->lowongan_id = $requestData['lowongan_id'];
    $panggilantes->perusahaan_id = $requestData['perusahaan_id'];
    $panggilantes->admin_id = $requestData['admin_id'] ?? null;  // Jika admin_id tidak ada, set null
    $panggilantes->nama = $requestData['nama'];
    $panggilantes->tanggal_pt = $requestData['tanggal_pt'];
    $panggilantes->status = $requestData['status'];

    // Simpan data panggilan tes ke database
    $panggilantes->save();

    session()->flash('success', 'Data Panggilan Tes berhasil ditambahkan');
    return redirect('/kelolapanggilantesperusahaan');
}

    // Method edit, update, dan destroy tetap sama
}
