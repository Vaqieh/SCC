@extends('layouts.app')

@section('content')
@endsection
<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content" data-aos="fade-up" data-aos-delay="200">

                        <h1 class="mb-4">
                            Sumatera Career <br>
                            Center <br>
                        </h1>

                        <p class="mb-4 mb-md-5">
                            Mendaftar pekerjaan adalah langkah pertama untuk membangun karier yang sukses.
                            Proses ini memungkinkan pelamar untuk menunjukkan kemampuan dan pengalaman mereka kepada
                            perusahaan.
                        </p>

                        <div class="hero-buttons">
                            <a href="#about" class="btn btn-primary me-0 me-sm-2 mx-1">Get Started</a>
                            <a href="https://youtu.be/wGr2BeA5VoI?feature=shared"
                                class="btn btn-link mt-2 mt-sm-0 glightbox">
                                <i class="bi bi-play-circle me-1"></i>
                                Play Video
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                        <img src="iLanding/assets/img/dashboard.png" alt="Team Work" class="img-fluid">
                    </div>
                </div>
            </div>

            <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
                <div class="col-lg-3 col-md-6"></div>
                <div class="stat-content">
                    <img src="iLanding/assets/img/pertamina.png" class="testimonial-img" alt=""
                        style="width: 19%; height: 150px; object-fit: cover;">

                    <img src="iLanding/assets/img/slb.jpg" class="testimonial-img" alt=""
                        style="width: 19%; height: 150px; object-fit: cover;">

                    <img src="iLanding/assets/img/hb.png" class="testimonial-img" alt=""
                        style="width: 19%; height: 150px; object-fit: cover;">

                    <img src="iLanding/assets/img/raap.jpg" class="testimonial-img" alt=""
                        style="width: 19%; height: 150px; object-fit: cover;">

                    <img src="iLanding/assets/img/fp.png" class="testimonial-img" alt=""
                        style="width: 18%; height: 150px; object-fit: cover;">
                </div>
            </div>
        </div>
        </div>

        <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Total Pelamar</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="30" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Total Perusahaan</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="25" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Lowongan Terbuka</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Lowongan Tertutup</p>
                    </div>
                </div><!-- End Stats Item -->

    </section><!-- /Hero Section -->

    <!-- Features Cards Section -->
    <section id="features-cards" class="features-cards section">

        <div class="container">
            <div class="row gy-4">
                @foreach ($kelolalowongan as $item)
                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                        <div
                            style="border: 1px solid #ddd; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            @if ($item->gambar_lowongan)
                                <img src="{{ \Storage::url($item->gambar_lowongan) }}" alt="Gambar Lowongan"
                                    style="width: 100%; height: 150px; object-fit: cover;">
                            @else
                                <img src="path/to/default-image.jpg" alt="Default Image"
                                    style="width: 100%; height: 150px; object-fit: cover;">
                            @endif
                            <div style="padding: 15px;">
                                <h4 style="text-align: center; margin-bottom: 10px;">
                                    <a href="{{ route('kelolalowongan.show', $item->id) }}"
                                        style="text-decoration: none; color: black;"
                                        onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'">
                                        {{ $item->nama_lowongan }}
                                    </a>
                                </h4>
                                <p style="font-size: 14px; color: #555;">
                                    <i class="bi bi-building"
                                        style="margin-right: 5px; color: #555;"></i>{{ $item->perusahaan->p_nama ?? 'Perusahaan Tidak Diketahui' }}
                                </p>
                                <p style="font-size: 13px; color: #777;">
                                    <i class="bi bi-calendar"
                                        style="margin-right: 5px; color: #777;"></i>{{ $item->tanggal_verifikasi ?? 'Belum Diverifikasi' }}
                                </p>
                                <p style="font-size: 13px; color: #777;">
                                    <i class="bi bi-person" style="margin-right: 5px; color: #777;"></i>Status:
                                    {{ $item->status_lowongan }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

                
    </section><!-- /Features 2 Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Testimonials</h2>
                <p>Berikut adalah testimonial langsung dari pengguna yang telah merasakan manfaat dan kemudahan dalam
                    menggunakan web Sumtera Career Center</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row g-5">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="testimonial-item">
                            <img src="iLanding/assets/img/testimonials/profile4.jpg" class="testimonial-img"
                                alt="">
                            <h3>Xavier</h3>
                            <h4>Programmer</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Saya merasa terbantu sekali dengan platform Sumatera Career Center. Melalui
                                    platform ini, saya bisa
                                    menemukan berbagai lowongan pekerjaan yang sesuai dengan keahlian, minat dan bakat
                                    saya pada bidang Teknologi Informasi.
                                    Proses pendaftaran yang mudah, membuat saya lebih percaya diri dalam mencari
                                    pekerjaan.
                                </span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="testimonial-item">
                            <img src="iLanding/assets/img/testimonials/profile1.jpg" class="testimonial-img"
                                alt="">
                            <h3>Sara Wilsson</h3>
                            <h4>Web Designer</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Sebagai fresh graduate pada bidang UI/UX saya terbantu dengan adanya informasi
                                    lowongan pekerjaan
                                    yang up to date dari platform Sumatera Career Center. Saya berhasil mendapatkan
                                    pekerjaan pertama saya
                                    sebagai seorang Web Designer di salah satu perusahaan besar yang terletak di pulau
                                    jawa.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="testimonial-item">
                            <img src="iLanding/assets/img/testimonials/profile3.jpg" class="testimonial-img"
                                alt="">
                            <h3>Jena Karlis</h3>
                            <h4>Manager</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Saya merupakan alumni Politeknik Caltex Riau, berkat platform SCC saya mendapatkan
                                    pekerjaan pertama saya
                                    sebagai Manager di salah satu perusahaan ternama. </span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="testimonial-item">
                            <img src="iLanding/assets/img/testimonials/profile2.jpg" class="testimonial-img"
                                alt="">
                            <h3>Matthew Bomer</h3>
                            <h4>Direktur PT.Sumber Mandiri</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Perusahaan kami bekerja sama dengan SCC untuk mencari kandidat yang berkualitas,
                                    platform yang
                                    sangat membantu kami dalam menyebar informasi mengenai lowongan pekerjaan dan kami
                                    berhasil menemukan
                                    kandidat yang diinginkan.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                </div>

            </div>

        </section><!-- /Testimonials Section -->

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <section id="about" class="testimonials section light-background">

                <h2>Tentang Kami</h2>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="d-flex justify-content-center">

                <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">

                    <li class="nav-item">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                            <h4>Visi</h4>
                        </a>
                    </li><!-- End tab nav item -->

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                            <h4>Misi</h4>
                        </a><!-- End tab nav item -->

                    </li>
                </ul>
            </div>

            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                <div class="tab-pane fade active show" id="features-tab-1">
                    <div class="row">
                        <div
                            class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                            <h3>Visi</h3>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> <span>Menjadi institusi karir yang mewadahi para
                                        alumni yang berbasis IT
                                        dalam menyajikan informasi karis, pengembangan diri, dan pelayanan
                                        rekruitment</span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="assets/img/features-illustration-1.webp" alt="" class="img-fluid">
                        </div>
                    </div>
                </div><!-- End tab content item -->

                <div class="tab-pane fade" id="features-tab-2">
                    <div class="row">
                        <div
                            class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                            <h3>Misi</h3>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> <span>Membangun organisasi yang mewadahi alumni
                                        dan menjadi tempat untuk
                                        menjalin komunikasi dan silaturahmi bagi alumni.</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>Menjadi career center pertama yang
                                        mengedepankan inovasi, professionalisme,
                                        saling menghargai, dan religious.</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>Memberikan informasi rekrutment dan karir
                                        yang terpercaya, serta program pengembangan
                                        diri kepada mahasiswa dan alumni</span></li>
                                <li><i class="bi bi-check2-all"></i> <span> Memberikan layanan rekrutmen yang efektif
                                        dan solutif kepada perusahaan</span></li>
                                <li><i class="bi bi-check2-all"></i> <span>Memberikan dukungan pada kampus dalam
                                        pengembangan karir mahasiswa dan alumni,
                                        serta kerjasama dengan dunia industri</span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">

                        </div>
                    </div>
                </div><!-- End tab content item -->

            </div>

        </div>

    </section><!-- /Features Section -->

    <!-- Faq Section -->
    <section class="faq-9 faq section light-background" id="faq">

        <div class="container">
            <div class="row">

                <div class="col-lg-5" data-aos="fade-up">
                    <h2 class="faq-title">Have a question? Check out the FAQ</h2>
                    <p class="faq-description">Maecenas tempus tellus eget condimentum rhoncus sem quam semper libero
                        sit amet adipiscing sem neque sed ipsum.</p>
                    <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
                        <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z"
                                fill="currentColor"></path>
                        </svg>
                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
                    <div class="faq-container">

                        <div class="faq-item faq-active">
                            <h3>Bagaimana cara mendaftar di Sumatera Career Center?</h3>
                            <div class="faq-content">
                                <p>Anda dapat mendaftar dengan mengunjungi halaman utama Sumatera Career Center,
                                    kemudian klik tombol "Daftar" di bagian atas halaman. Pilih jenis akun yang
                                    sesuai
                                    (Pelamar atau Perusahaan) dan lengkapi formulir pendaftaran dengan informasi
                                    yang diperlukan.
                                    Setelah selesai, Anda akan menerima email konfirmasi untuk mengaktifkan akun
                                    Anda.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Apakah ada biaya untuk menggunakan layanan Sumatera Career Center?</h3>
                            <div class="faq-content">
                                <p>Tidak ada biaya untuk menggunakan layanan Sumatera Career Center baik bagi
                                    pencari kerja
                                    maupun perusahaan
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3> Bagaimana cara perusahaan memposting lowongan pekerjaan di Sumatera Career Center?
                            </h3>
                            <div class="faq-content">
                                <p>Perusahaan dapat memposting lowongan pekerjaan dengan membuat akun sebagai
                                    perusahaan di Sumatera Career Center.
                                    Setelah akun terverifikasi, perusahaan dapat mengakses dasbor dan mulai
                                    memposting lowongan pekerjaan. </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Apakah saya bisa melamar pekerjaan tanpa membuat akun di Sumatera Career Center??


                            </h3>
                            <div class="faq-content">
                                <p>Untuk melamar pekerjaan melalui Sumatera Career Center, Anda perlu membuat akun
                                    terlebih dahulu.
                                    Hal ini memungkinkan kami untuk memverifikasi aplikasi Anda dan menjaga
                                    informasi Anda tetap aman.
                                    Akun yang terdaftar juga mempermudah proses pelacakan lamaran Anda.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Faq Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>Untuk informasi lebih lanjut tentang Sumatera Career Center,
                Anda dapat menghubungi kami melalui beberapa saluran yang tersedia.</p>
        </div>
        <!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-4 g-lg-5">
                <div class="col-lg-5">
                    <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                        <h3>Informasi Kontak</h3>
                        <p>Untuk informasi lebih lanjut tentang Sumatera Career Center, Anda dapat menghubungi kami
                            melalui beberapa saluran yang tersedia.</p>
                        <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div class="content">
                                <h4>Lokasi Kami</h4>
                                <p>Jl. Umban Sari (Patin) No. 1</p>
                                <p>Rumbai, Pekanbaru, Riau Indonesia 28265</p>
                            </div>
                        </div>

                        <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon-box">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <div class="content">
                                <h4>Nomor Telepon</h4>
                                <p>08117574101</p>
                                <p>(0761) - 554224</p>
                            </div>
                        </div>

                        <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                            <div class="icon-box">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div class="content">
                                <h4>Alamat Email</h4>
                                <p>scc@pcr.ac.id</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
                        <h3>Hubungi Kami</h3>
                        <p>Jika Anda memiliki pertanyaan atau ingin mendapatkan informasi lebih lanjut tentang
                            Sumatera Career Center, jangan ragu untuk menghubungi kami melalui formulir kontak di
                            bawah ini.</p>

                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Nama Anda" required="">
                                </div>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Email Anda" required="">
                                </div>

                                <div class="col-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subjek"
                                        required="">
                                </div>

                                <div class="col-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required=""></textarea>
                                </div>

                                <div class="col-12 text-center">
                                    <div class="loading">Memuat</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Pesan Anda telah dikirim. Terima kasih!</div>

                                    <button type="submit" class="btn">Kirim Pesan</button>
                                    <button type="submit" class="btn">Kirim Pesan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Contact Section -->


    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4 align-items-center justify-content-between">

                <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
                    <span class="about-meta">TENTANG KAMI LEBIH</span>
                    <h2 class="about-title">Voluptas enim suscipit temporibus</h2>
                    <p class="about-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                        accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                        veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>

                    <div class="row feature-list-wrapper">
                        <div class="col-md-6">
                            <ul class="feature-list">
                                <li><i class="bi bi-check-circle-fill"></i> Lorem ipsum dolor sit amet</li>
                                <li><i class="bi bi-check-circle-fill"></i> Consectetur adipiscing elit</li>
                                <li><i class="bi bi-check-circle-fill"></i> Sed do eiusmod tempor</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="feature-list">
                                <li><i class="bi bi-check-circle-fill"></i> Incididunt ut labore et</li>
                                <li><i class="bi bi-check-circle-fill"></i> Dolore magna aliqua</li>
                                <li><i class="bi bi-check-circle-fill"></i> Ut enim ad minim veniam</li>
                            </ul>
                        </div>
                    </div>

                    <div class="info-wrapper">
                        <div class="row gy-4">
                            <div class="col-lg-5">
                                <div class="profile d-flex align-items-center gap-3">
                                    <img src="assets/img/avatar-1.webp" alt="CEO Profile" class="profile-image">
                                    <div>
                                        <h4 class="profile-name">Mario Smith</h4>
                                        <p class="profile-position">CEO &amp; Founder</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="contact-info d-flex align-items-center gap-2">
                                    <i class="bi bi-telephone-fill"></i>
                                    <div>
                                        <p class="contact-label">Call us anytime</p>
                                        <p class="contact-number">+123 456-789</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="image-wrapper">
                        <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                            <img src="assets/img/about-5.webp" alt="Business Meeting"
                                class="img-fluid main-image rounded-4">
                            <img src="assets/img/about-2.webp" alt="Team Discussion"
                                class="img-fluid small-image rounded-4">
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </section><!-- /About Section -->
</main>
