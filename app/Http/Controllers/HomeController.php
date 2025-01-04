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
        // Ambil jumlah pelamar berdasarkan jenis kelamin
        $totalLaki = KelolaPelamar::where('JenisKelamin', 'laki-laki')->count();
        $totalPerempuan = KelolaPelamar::where('JenisKelamin', 'perempuan')->count();

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

        // Mengirimkan data ke view
        return view('admin.dashboardadmin', [
            'totalLaki' => $totalLaki,
            'totalPerempuan' => $totalPerempuan,
            'totalPelamar' => $totalPelamar,
            'totalPerusahaan' => $totalPerusahaan,
            'totalEmail' => $totalEmail,
            'lowonganTerverifikasiPerBulan' => $lowonganTerverifikasiPerBulan,
            'lowonganBelumTerverifikasiPerBulan' => $lowonganBelumTerverifikasiPerBulan,
            'bulanLabels' => $bulanLabels,
            'jumlahLowonganTerverifikasi' => $jumlahLowonganTerverifikasi,
            'jumlahLowonganBelumTerverifikasi' => $jumlahLowonganBelumTerverifikasi
        ]);
    }
}
