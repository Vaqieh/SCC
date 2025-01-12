<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelolaPelamar;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::guest()) {
            return redirect()->route('login.admin');  // Redirect ke login admin jika belum login
        }

        if (Auth::user()->role !== 'admin') {
            return redirect('/login/admin')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        // Ambil jumlah lowongan berdasarkan status
        $statusMenunggu = DB::table('lowongans')->where('status_lowongan', 'menunggu')->count();
        $statusDiterima = DB::table('lowongans')->where('status_lowongan', 'diterima')->count();
        $statusDitolak = DB::table('lowongans')->where('status_lowongan', 'ditolak')->count();
        // Ambil jumlah pelamar berdasarkan jenis kelamin
        $totalLaki = KelolaPelamar::where('JenisKelamin', 'laki-laki')->count();
        $totalPerempuan = KelolaPelamar::where('JenisKelamin', 'perempuan')->count();

        // Ambil semua pelamar untuk digunakan di view
        $pelamars = KelolaPelamar::all(); // Ambil semua pelamar dari tabel

        // Ambil jumlah akun pelamar dan perusahaan
        $totalPelamar = User::where('role', 'pelamar')->count();
        $totalPerusahaan = User::where('role', 'perusahaan')->count();
        $totalEmail = User::where('role', 'email')->count();

        // Ambil jumlah lowongan terverifikasi per bulan
        $lowonganTerverifikasiPerBulan = DB::table('lowongans')
            ->selectRaw('MONTH(tanggal_verifikasi) as bulan, YEAR(tanggal_verifikasi) as tahun, COUNT(*) as jumlah')
            ->whereNotNull('tanggal_verifikasi')
            ->groupBy(DB::raw('MONTH(tanggal_verifikasi)'), DB::raw('YEAR(tanggal_verifikasi)'))
            ->orderBy(DB::raw('YEAR(tanggal_verifikasi)'), 'asc')
            ->orderBy(DB::raw('MONTH(tanggal_verifikasi)'), 'asc')
            ->get();

        // Ambil jumlah lowongan belum terverifikasi per bulan
        $lowonganBelumTerverifikasiPerBulan = DB::table('lowongans')
            ->selectRaw('MONTH(tanggal_buat) as bulan, YEAR(tanggal_buat) as tahun, COUNT(*) as jumlah')
            ->whereNull('tanggal_verifikasi')
            ->groupBy(DB::raw('MONTH(tanggal_buat)'), DB::raw('YEAR(tanggal_buat)'))
            ->orderBy(DB::raw('YEAR(tanggal_buat)'), 'asc')
            ->orderBy(DB::raw('MONTH(tanggal_buat)'), 'asc')
            ->get();

        // Menyiapkan data untuk grafik
        $bulanLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $jumlahLowonganTerverifikasi = array_fill(0, 12, 0);
        $jumlahLowonganBelumTerverifikasi = array_fill(0, 12, 0);

        foreach ($lowonganTerverifikasiPerBulan as $item) {
            $bulanIndex = $item->bulan - 1;
            $jumlahLowonganTerverifikasi[$bulanIndex] = $item->jumlah;
        }

        foreach ($lowonganBelumTerverifikasiPerBulan as $item) {
            $bulanIndex = $item->bulan - 1;
            $jumlahLowonganBelumTerverifikasi[$bulanIndex] = $item->jumlah;
        }

        // Mengirimkan data ke view, termasuk data pelamar
        return view('admin.dashboardadmin', [
            'statusMenunggu' => $statusMenunggu,
            'statusDiterima' => $statusDiterima,
            'statusDitolak' => $statusDitolak,
            'totalLaki' => $totalLaki,
            'totalPerempuan' => $totalPerempuan,
            'totalPelamar' => $totalPelamar,
            'totalPerusahaan' => $totalPerusahaan,
            'totalEmail' => $totalEmail,
            'lowonganTerverifikasiPerBulan' => $lowonganTerverifikasiPerBulan,
            'lowonganBelumTerverifikasiPerBulan' => $lowonganBelumTerverifikasiPerBulan,
            'bulanLabels' => $bulanLabels,
            'jumlahLowonganTerverifikasi' => $jumlahLowonganTerverifikasi,
            'jumlahLowonganBelumTerverifikasi' => $jumlahLowonganBelumTerverifikasi,
            'pelamars' => $pelamars // Mengirimkan data pelamar
        ]);
    }


    public function dashboardPerusahaan()
{
     // Mengecek apakah pengguna sudah login
     if (Auth::guest()) {
        // Redirect ke halaman login perusahaan jika belum login
        return redirect()->route('login.perusahaan');
    }

    // Mengecek apakah pengguna adalah perusahaan
    if (Auth::user()->role !== 'perusahaan') {
        // Jika bukan perusahaan, redirect ke halaman lain, misalnya dashboard admin
        return redirect()->route('admin.dashboard'); // Atau halaman lain yang sesuai
    }

    // Ambil jumlah pelamar berdasarkan jenis kelamin
    $totalLaki = KelolaPelamar::where('JenisKelamin', 'laki-laki')->count();
    $totalPerempuan = KelolaPelamar::where('JenisKelamin', 'perempuan')->count();

    // Ambil semua pelamar untuk digunakan di view
    $pelamars = KelolaPelamar::all(); // Ambil semua pelamar dari tabel
    
    // Ambil jumlah lowongan berdasarkan status
    $statusMenunggu = DB::table('lowongans')->where('status_lowongan', 'menunggu')->count();
    $statusDiterima = DB::table('lowongans')->where('status_lowongan', 'diterima')->count();
    $statusDitolak = DB::table('lowongans')->where('status_lowongan', 'ditolak')->count();

    // Ambil jumlah pelamar berdasarkan jenis kelamin
    $totalLaki = KelolaPelamar::where('JenisKelamin', 'laki-laki')->count();
    $totalPerempuan = KelolaPelamar::where('JenisKelamin', 'perempuan')->count();

    // Ambil jumlah total pelamar
    $totalPelamar = KelolaPelamar::count();  // Total pelamar

    // Ambil semua pelamar untuk digunakan di view
    $pelamars = KelolaPelamar::all(); // Ambil semua pelamar dari tabel

    // Ambil jumlah pelamar per tahun
    $pelamarPerTahun = KelolaPelamar::selectRaw('YEAR(created_at) as tahun, COUNT(*) as total')
        ->groupBy('tahun')
        ->orderBy('tahun', 'asc')
        ->get();

    // Debugging (untuk memastikan data yang dikirim ke view)
    // dd(compact('totalLaki', 'totalPerempuan', 'totalPelamar', 'pelamars', 'statusMenunggu', 'statusDiterima', 'statusDitolak', 'pelamarPerTahun'));

    // Mengirimkan data ke view perusahaan
    return view('perusahaan.dashboardperusahaan', [
        'totalLaki' => $totalLaki,  // Mengirimkan jumlah laki-laki
        'totalPerempuan' => $totalPerempuan,  // Mengirimkan jumlah perempuan
        'totalPelamar' => $totalPelamar,  // Mengirimkan jumlah total pelamar
        'pelamars' => $pelamars,  // Mengirimkan data pelamar
        'statusMenunggu' => $statusMenunggu,  // Mengirimkan status lowongan menunggu
        'statusDiterima' => $statusDiterima,  // Mengirimkan status lowongan diterima
        'statusDitolak' => $statusDitolak,  // Mengirimkan status lowongan ditolak
        'tahunLabels' => $pelamarPerTahun->pluck('tahun'),  // Menambahkan labels tahun
        'totalPelamarPerTahun' => $pelamarPerTahun->pluck('total'),  // Menambahkan data jumlah pelamar per tahun
    ]);
}

}
