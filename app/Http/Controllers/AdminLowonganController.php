<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lowongan;
use App\Models\Admin;
use App\Models\KelolaPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAdminLowonganRequest;
use App\Models\KelolaPelamar;

class AdminLowonganController extends Controller
{
    // Menampilkan daftar lowongan
    public function index()
    {
        if (Auth::guest()) {
            return redirect()->route('login.admin');  // Sesuaikan dengan role
        }
        // Jika sudah login, cek apakah role sesuai
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('login.admin');  // Redirect ke login jika bukan admin
        }

        // Ambil data lowongan dengan pagination
        if (request()->filled('q')) {
            $data['kelolalowongan'] = Lowongan::search(request('q'))->paginate(10);
        } else {
            $data['kelolalowongan'] = Lowongan::latest()->paginate(10);
        }
        return view('admin.KelolaLowongan', $data);
    }

    // Menampilkan halaman untuk menambah lowongan
    public function create()
    {
        $currentUser = Auth::user(); // Mendapatkan user yang sedang login

        // Ambil satu admin yang sesuai dengan email atau nama
        $listAdmin = Admin::where('email', $currentUser->email)
            ->orWhere('admin_nama', $currentUser->name)
            ->first(); // Mengambil objek admin tunggal

        // Cek jika admin tidak ditemukan
        if (!$listAdmin) {
            session()->flash('error', 'Profil admin belum lengkap. Mohon lengkapi profil Anda untuk melanjutkan.');
            return back();
        }

        // Ambil list perusahaan
        $data['listAdmin'] = $listAdmin;
        $data['listPerusahaan'] = KelolaPerusahaan::orderBy('p_nama', 'asc')->get();

        return view('admin.KelolaLowonganCreated', $data);
    }

    public function update(Request $request, $id)
    {
        // Validasi data request
        $validatedData = $request->validate([
            'perusahaan_id' => 'nullable|exists:kelola_perusahaans,id',
            'nama_lowongan' => 'nullable|string|max:255',
            'status_lowongan' => 'nullable|in:menunggu,diterima,ditolak',
            'tanggal_buat' => 'nullable|date',
            'tanggal_berakhir' => 'nullable|date',
            'tanggal_verifikasi' => 'nullable|date', // Ubah menjadi nullable karena kita akan mengatur default-nya
            'pendidikan' => 'nullable|in:D3,D4,S1,S2,S3',
            'pengalaman_kerja' => 'nullable|string|max:255',
            'umur' => 'nullable|integer|min:18',
            'gambar_lowongan' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
            'file' => 'nullable|file|mimes:pdf,doc,docx,rar,zip|max:10000',
            'detail' => 'nullable|string|max:255', // Optional but must be validated
        ]);

        // Mengambil data lowongan berdasarkan ID
        $lowongan = Lowongan::findOrFail($id);

        // Tentukan tanggal_verifikasi, jika tidak ada dari form, gunakan tanggal sekarang
        $tanggalVerifikasi = isset($validatedData['tanggal_verifikasi']) && $validatedData['tanggal_verifikasi']
            ? Carbon::parse($validatedData['tanggal_verifikasi'])
            : Carbon::now();  // Jika kosong, set dengan tanggal sekarang

        // Data yang akan diupdate
        $updateData = [
            'perusahaan_id' => $validatedData['perusahaan_id'],
            'nama_lowongan' => $validatedData['nama_lowongan'],
            'status_lowongan' => $validatedData['status_lowongan'],
            'tanggal_buat' => $validatedData['tanggal_buat'] ? Carbon::parse($validatedData['tanggal_buat']) : null,
            'tanggal_berakhir' => $validatedData['tanggal_berakhir'] ? Carbon::parse($validatedData['tanggal_berakhir']) : null,
            'tanggal_verifikasi' => $tanggalVerifikasi,  // Gunakan tanggal_verifikasi yang sudah disesuaikan
            'pendidikan' => $validatedData['pendidikan'],
            'pengalaman_kerja' => $validatedData['pengalaman_kerja'],
            'umur' => $validatedData['umur'],
            'detail' => $validatedData['detail'] ?? null, // Handle the 'detail' field properly if it's missing
        ];

        // Simpan gambar lowongan jika ada
        if ($request->hasFile('gambar_lowongan')) {
            // Hapus gambar lama jika ada
            if ($lowongan->gambar_lowongan && Storage::exists($lowongan->gambar_lowongan)) {
                Storage::delete($lowongan->gambar_lowongan);
            }
            // Simpan gambar baru
            $updateData['gambar_lowongan'] = $request->file('gambar_lowongan')->store('lowongan', 'public');
        }

        // Simpan file lowongan jika ada
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($lowongan->file && Storage::exists($lowongan->file)) {
                Storage::delete($lowongan->file);
            }
            // Simpan file baru
            $updateData['file'] = $request->file('file')->store('files', 'public');
        }

        // Lakukan update hanya pada data yang ada dalam $updateData
        $lowongan->update($updateData);

        return redirect()->route('kelolalowongan.index')->with('success', 'Lowongan berhasil diperbarui!');
    }



    // Menampilkan halaman untuk mengedit lowongan
    public function edit($id)
    {
        // Mengambil data lowongan berdasarkan ID
        $lowongan = Lowongan::findOrFail($id);

        // Mengonversi tanggal_buat dan tanggal_berakhir menjadi objek Carbon jika belum
        if ($lowongan->tanggal_buat) {
            $lowongan->tanggal_buat = Carbon::parse($lowongan->tanggal_buat);
        }

        if ($lowongan->tanggal_berakhir) {
            $lowongan->tanggal_berakhir = Carbon::parse($lowongan->tanggal_berakhir);
        }

        // Jika tanggal_verifikasi null, set ke tanggal sekarang
        if (!$lowongan->tanggal_verifikasi) {
            $lowongan->tanggal_verifikasi = Carbon::now(); // Set to current date if it's null
        } else {
            $lowongan->tanggal_verifikasi = Carbon::parse($lowongan->tanggal_verifikasi);
        }

        // Ambil data list admin dan perusahaan untuk dipilih
        $currentUser = Auth::user(); // Mendapatkan user yang sedang login
        $listAdmin = Admin::where('email', $currentUser->email)
            ->orWhere('admin_nama', $currentUser->name)
            ->first();

        if (!$listAdmin) {
            session()->flash('error', 'Profil admin belum lengkap. Mohon lengkapi profil Anda untuk melanjutkan.');
            return back();
        }

        // Kirim data ke view
        $data['lowongan'] = $lowongan;
        $data['listAdmin'] = $listAdmin;
        $data['listPerusahaan'] = KelolaPerusahaan::orderBy('p_nama', 'asc')->get();
        $data['tanggalVerifikasi'] = Carbon::now()->toDateString(); // Kirimkan tanggal saat ini ke view

        return view('admin.KelolaLowonganEdit', $data);
    }




    // Menyimpan data lowongan ke database
    public function store(StoreAdminLowonganRequest $request)
    {
        // Validasi data request
        $validatedData = $request->validate([
            'admin_id' => 'required|exists:admins,id',
            'perusahaan_id' => 'required|exists:kelola_perusahaans,id',
            'nama_lowongan' => 'required|string|max:255',
            'status_lowongan' => 'required|string|max:50',
            'tanggal_buat' => 'required|date',
            'tanggal_berakhir' => 'required|date',
            'tanggal_verifikasi' => 'nullable|date',
            'pendidikan' => 'required|string|max:255',
            'pengalaman_kerja' => 'required|string|max:255',
            'umur' => 'required|integer|min:18',
            'gambar_lowongan' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'file' => 'required|file|mimes:pdf,doc,docx,rar,zip|max:10000',
            'detail' => 'required|string|max:255',
            'kuota' => 'required|string|max:255',
        ]);

        // Proses dan simpan data ke database
        $lowongan = new Lowongan();
        $lowongan->admin_id = $validatedData['admin_id'];
        $lowongan->perusahaan_id = $validatedData['perusahaan_id'];
        $lowongan->nama_lowongan = $validatedData['nama_lowongan'];
        $lowongan->status_lowongan = $validatedData['status_lowongan'];
        $lowongan->tanggal_buat = $validatedData['tanggal_buat'];
        $lowongan->tanggal_berakhir = $validatedData['tanggal_berakhir'];
        $lowongan->tanggal_verifikasi = $validatedData['tanggal_verifikasi'] ?? null;  // jika kosong, set null
        $lowongan->pendidikan = $validatedData['pendidikan'];
        $lowongan->pengalaman_kerja = $validatedData['pengalaman_kerja'];
        $lowongan->umur = $validatedData['umur'];
        $lowongan->file = $validatedData['file'];
        $lowongan->detail = $validatedData['detail'];
        $lowongan->kuota = $validatedData['kuota'];

        // Cek dan simpan gambar lowongan
        if ($request->hasFile('gambar_lowongan')) {
            // Hapus gambar lama jika ada
            if ($lowongan->gambar_lowongan && Storage::exists($lowongan->gambar_lowongan)) {
                Storage::delete($lowongan->gambar_lowongan);
            }
            // Simpan gambar baru di folder 'public/lowongan'
            $lowongan->gambar_lowongan = $request->file('gambar_lowongan')->store('lowongan', 'public');
        }

        // Cek dan simpan file jika ada
        if ($request->hasFile('file')) {
            // Simpan file di folder 'public/files'
            $lowongan->file = $request->file('file')->store('files', 'public');
        }

        $lowongan->save();

        return back()->with('success', 'Data Lowongan berhasil ditambahkan!');
    }

    public function show($id)
{
    // Ambil lowongan berdasarkan ID
    $lowongan = Lowongan::find($id);

    // Jika lowongan ditemukan, ambil semua pelamar yang sesuai
    $pelamars = KelolaPelamar::where('id', $id)->get();  // Anda harus sesuaikan kondisi where ini
    // Jika tidak ada hubungan eksplisit, mungkin melalui filter nama lowongan atau ID perusahaan

    return view('admin.KelolaLowonganPrint', compact('lowongan', 'pelamars'));
}




    // public function printLowongan()
    // {
    //     // Mengambil semua data lowongan dari database
    //     $lowongan = Lowongan::all();

    //     // Meneruskan data ke view untuk ditampilkan
    //     return view('admin.KelolaLowonganPrint', compact('lowongans'));
    // }
}
