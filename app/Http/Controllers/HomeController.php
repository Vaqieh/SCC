<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelolaPelamar;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
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
        // Ambil jumlah lowongan berdasarkan status
        $statusMenunggu = DB::table('lowongans')->where('status_lowongan', 'menunggu')->count();
        $statusDiterima = DB::table('lowongans')->where('status_lowongan', 'diterima')->count();
        $statusDitolak = DB::table('lowongans')->where('status_lowongan', 'ditolak')->count();
        // Ambil jumlah pelamar berdasarkan jenis kelamin
        $totalLaki = KelolaPelamar::where('JenisKelamin', 'laki-laki')->count();
        $totalPerempuan = KelolaPelamar::where('JenisKelamin', 'perempuan')->count();

        // Ambil jumlah total pelamar
        $totalPelamar = KelolaPelamar::count();  // Add this line

        // Ambil semua pelamar untuk digunakan di view
        $pelamars = KelolaPelamar::all(); // Ambil semua pelamar dari tabel

        // Ambil jumlah pelamar per tahun
        $pelamarPerTahun = KelolaPelamar::selectRaw('YEAR(created_at) as tahun, COUNT(*) as total')
            ->groupBy('tahun')
            ->orderBy('tahun', 'asc')
            ->get();

        // Menyiapkan data untuk grafik
        $tahunLabels = $pelamarPerTahun->pluck('tahun');
        $totalPelamarPerTahun = $pelamarPerTahun->pluck('total');
        // Mengirimkan data ke view perusahaan
        return view('perusahaan.dashboardperusahaan', [
            'totalLaki' => $totalLaki,
            'totalPerempuan' => $totalPerempuan,
            'totalPelamar' => $totalPelamar,  // Pass this to the view
            'pelamars' => $pelamars, // Mengirimkan data pelamar
            'statusMenunggu' => $statusMenunggu,
            'statusDiterima' => $statusDiterima,
            'statusDitolak' => $statusDitolak,
            'tahunLabels' => $tahunLabels,  // Menambahkan labels tahun
            'totalPelamarPerTahun' => $totalPelamarPerTahun,  // Menambahkan data jumlah pelamar per tahun
        ]);
    }
}
