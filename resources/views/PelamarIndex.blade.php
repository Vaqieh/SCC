@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Selamat Datang di Halaman Pelamar!</h1>
            <p class="text-center">Halaman ini ditampilkan tanpa menggunakan controller.</p>
            <hr>
            <div class="content">
                <h2>Artikel: Mengapa Kita Perlu Mendaftar Pekerjaan?</h2>
                <p>
                    Dalam dunia kerja, mendaftar pekerjaan adalah langkah pertama untuk membangun karier yang sukses.
                    Proses ini memungkinkan pelamar untuk menunjukkan kemampuan dan pengalaman mereka kepada perusahaan.
                </p>
                <p>
                    Berikut adalah beberapa alasan mengapa penting untuk aktif dalam melamar pekerjaan:
                </p>
                <ul>
                    <li><strong>Menunjukkan Kemampuan:</strong> Anda dapat menunjukkan kepada perusahaan apa yang membuat Anda unik.</li>
                    <li><strong>Mencari Pengalaman:</strong> Melalui wawancara dan tes, Anda akan belajar lebih banyak tentang dunia kerja.</li>
                    <li><strong>Membangun Jaringan:</strong> Setiap aplikasi adalah kesempatan untuk memperluas koneksi profesional Anda.</li>
                </ul>
                <p>Jangan lupa untuk selalu mempersiapkan CV dan surat lamaran terbaik Anda. Semoga sukses!</p>
            </div>
            <div class="text-center mt-4">
                <p>RAWRRRRRRRRRRRRRRRRRRRRRRRRR</p>
                <img src="{{ url('image/logo_scc (1).png') }}" alt="Logo SCC" class="img-fluid" style="max-width: 200px;">
            </div>
        </div>
    </div>
</div>
@endsection
