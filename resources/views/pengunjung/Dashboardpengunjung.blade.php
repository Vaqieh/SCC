@extends('layouts.app')
@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                            <div class="company-badge mb-4">
                                <a href="https://youtu.be/wGr2BeA5VoI?si=yq6OulXuOlEq9BDe++++++++++"
                                    style="text-decoration: none; color: inherit;">
                                    <i class="bi bi-play-circle-fill fs-4"></i>
                                    <span>Play Video</span>
                                </a>
                            </div>
                            <h1 class="mb-4">
                                SUMATERA CAREER CENTER <br>
                            </h1>
                            <h3 class="mb-4 mb-md-5">
                                Mulai Perjalanan Karir Anda!
                            </h3>
                            <div class="hero-buttons">
                                <a href="#about" class="btn btn-primary me-0 me-sm-2 mx-1">LOGIN PELAMAR</a>
                                <a href="#about" class="btn btn-primary me-0 me-sm-2 mx-1">LOGIN PERUSAHAAN</a>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                            <img src="iLanding/assets/img/dashboard.png" alt="Team Work" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>

            <!--Tampilan Total Pelamar-->
            <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item rounded shadow p-4 text-center" style="background-color: #f8f9fa;">
                        <div class="stat-icon mb-3">
                            <i class="bi bi-person fs-2 text-primary"></i>
                        </div>
                        <div class="stat-content">
                            <h4 class="mb-0" style="font-size: 1.25rem; font-weight: 600;">Total Pelamar</h4>
                            <p class="fs-6 text-muted">1200</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item rounded shadow p-4 text-center" style="background-color: #f8f9fa;">
                        <div class="stat-icon mb-3">
                            <i class="bi bi-building fs-2 text-success"></i>
                        </div>
                        <div class="stat-content">
                            <h4 class="mb-0" style="font-size: 1.25rem; font-weight: 600;">Total Perusahaan</h4>
                            <p class="fs-6 text-muted">45</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item rounded shadow p-4 text-center" style="background-color: #f8f9fa;">
                        <div class="stat-icon mb-3">
                            <i class="bi bi-unlock fs-2 text-warning"></i>
                        </div>
                        <div class="stat-content">
                            <h4 class="mb-0" style="font-size: 1.25rem; font-weight: 600;">Total Lowongan Buka</h4>
                            <p class="fs-6 text-muted">25</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item rounded shadow p-4 text-center" style="background-color: #f8f9fa;">
                        <div class="stat-icon mb-3">
                            <i class="bi bi-lock fs-2 text-danger"></i>
                        </div>
                        <div class="stat-content">
                            <h4 class="mb-0" style="font-size: 1.25rem; font-weight: 600;">Total Lowongan Tutup</h4>
                            <p class="fs-6 text-muted">10</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /End Tampilan Total -->

            <!-- Card -->
            <section id="about" class="about-section py-5">
                <div class="container">
                    <!-- Wrapper utama dengan bayangan dan border -->
                    <div class="p-4 rounded shadow-lg" style="background-color: #f7faff;">
                        <!-- Kotak deskripsi dengan latar biru muda -->
                        <div class="p-4 rounded text-center" style="background-color: #e3f2fd; border: 1px solid #d1e7ff;">
                            <p class="about-description mb-0 fs-5" style="color: #0056b3; font-weight: 500;">
                                Sumatera Career Center membuka peluang kerja sama dengan <br>
                                industri, Dunia Usaha, dan Dunia Kerja (IDUKA).
                                <br>
                                <span style="font-size: 18px;">Hubungi kami:</span>
                            </p>
                        </div>

                        <!-- Informasi Kontak -->
                        <div class="info-wrapper mt-4 text-center">
                            <div class="row justify-content-center gy-4">
                                <!-- Kontak Telepon -->
                                <div class="col-md-6 col-lg-4">
                                    <div class="contact-card p-3 rounded shadow-sm d-flex align-items-center justify-content-center gap-3"
                                        style="background-color: #ffffff; border: 1px solid #e0e0e0;">
                                        <i class="bi bi-telephone-fill fs-2 text-primary"></i>
                                        <div>
                                            <p class="fs-5 mb-0" style="font-weight: bold;">09117574101</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Kontak Email -->
                                <div class="col-md-6 col-lg-4">
                                    <div class="contact-card p-3 rounded shadow-sm d-flex align-items-center justify-content-center gap-3"
                                        style="background-color: #ffffff; border: 1px solid #e0e0e0;">
                                        <i class="bi bi-envelope-fill fs-2 text-primary"></i>
                                        <div>
                                            <p class="fs-5 mb-0" style="font-weight: bold;">scc@pcr.ac.id</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /About Section -->

            <!-- Daftar Lowongan Pekerjaan -->
            <section id="hero" class="hero section">
                <div class="container text-center"
                    style="border: 1px solid #ddd; border-radius: 10px; padding: 20px; background-color: #f9f9f9; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <h2 class="mb-5"><b>Daftar Lowongan Pekerjaan</b></h2>

                    <!-- Grid Layout -->
                    <div style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 20px;">
                        <!-- Card 1 -->
                        <div
                            style="border: 1px solid #ddd; border-radius: 10px; width: 23%; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            <img src="iLanding/assets/img/programmer.jpg" alt="Poster Programmer"
                                style="width: 100%; height: 150px; object-fit: cover;">
                            <div style="padding: 15px; text-align: left;"> 
                                <h4 style="margin-bottom: 10px; font-size: 18px;">
                                    <center><a href="detail1.html" style="text-decoration: none; color: black;"
                                        onmouseover="this.style.color='blue'"
                                        onmouseout="this.style.color='black'">Programmer</a> </center>
                                </h4>
                                <p style="font-size: 14px; color: #555; margin: 5px 0;">
                                    <i class="bi bi-building" style="margin-right: 5px; color: #555;"></i>POLITEKNIK
                                    CALTEX RIAU
                                </p>
                                <p style="font-size: 13px; color: #777; margin: 5px 0;">
                                    <i class="bi bi-lock" style="margin-right: 5px; color: #777;"></i>17 September 2024 - 13 Oktober 2024
                                </p>
                                <p style="font-size: 13px; color: #777;">
                                    <i class="bi bi-person" style="margin-right: 5px; color: #777;"></i>Dibutuhkan: 0 orang
                                </p>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div
                            style="border: 1px solid #ddd; border-radius: 10px; width: 23%; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            <img src="iLanding/assets/img/staf_marketing.jpg" alt="Poster Marketing"
                                style="width: 100%; height: 150px; object-fit: cover;">
                            <div style="padding: 15px; text-align: left;"> 
                                <h4 style="margin-bottom: 10px; font-size: 18px;">
                                    <center><a href="detail2.html" style="text-decoration: none; color: black;"
                                        onmouseover="this.style.color='blue'"
                                        onmouseout="this.style.color='black'">Staf Marketing PCR</a> </center>
                                </h4>
                                <p style="font-size: 14px; color: #555; margin: 5px 0;">
                                    <i class="bi bi-building" style="margin-right: 5px; color: #555;"></i>POLITEKNIK
                                    CALTEX RIAU
                                </p>
                                <p style="font-size: 13px; color: #777; margin: 5px 0;">
                                    <i class="bi bi-lock" style="margin-right: 5px; color: #777;"></i>17 September 2024 - 13 Oktober 2024
                                </p>
                                <p style="font-size: 13px; color: #777;">
                                    <i class="bi bi-person" style="margin-right: 5px; color: #777;"></i>Dibutuhkan: 0 orang
                                </p>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div
                            style="border: 1px solid #ddd; border-radius: 10px; width: 23%; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            <img src="iLanding/assets/img/staf.png" alt="Poster Staf Administrasi"
                                style="width: 100%; height: 150px; object-fit: cover;">
                            <div style="padding: 15px; text-align: left;"> 
                                <h4 style="margin-bottom: 10px; font-size: 18px;">
                                    <center><a href="detail3.html" style="text-decoration: none; color: black;"
                                        onmouseover="this.style.color='blue'"
                                        onmouseout="this.style.color='black'">Staf Administrasi</a> </center>
                                </h4>
                                <p style="font-size: 14px; color: #555; margin: 5px 0;">
                                    <i class="bi bi-building" style="margin-right: 5px; color: #555;"></i>POLITEKNIK
                                    CALTEX RIAU
                                </p>
                                <p style="font-size: 13px; color: #777; margin: 5px 0;">
                                    <i class="bi bi-lock" style="margin-right: 5px; color: #777;"></i>17 September 2024 - 13 Oktober 2024
                                </p>
                                <p style="font-size: 13px; color: #777;">
                                    <i class="bi bi-person" style="margin-right: 5px; color: #777;"></i>Dibutuhkan: 0 orang
                                </p>
                            </div>
                        </div>

                        <!-- Card 4 -->
                        <div
                            style="border: 1px solid #ddd; border-radius: 10px; width: 23%; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            <img src="iLanding/assets/img/dosen.jpg" alt="Poster Dosen"
                                style="width: 100%; height: 150px; object-fit: cover;">
                            <div style="padding: 15px; text-align: left;"> 
                                <h4 style="margin-bottom: 10px; font-size: 18px;">
                                    <center><a href="detail4.html" style="text-decoration: none; color: black;"
                                        onmouseover="this.style.color='blue'"
                                        onmouseout="this.style.color='black'">Dosen Program Studi Sistem Informasi</a> </center>
                                </h4>
                                <p style="font-size: 14px; color: #555; margin: 5px 0;">
                                    <i class="bi bi-building" style="margin-right: 5px; color: #555;"></i>POLITEKNIK
                                    CALTEX RIAU
                                </p>
                                <p style="font-size: 13px; color: #777; margin: 5px 0;">
                                    <i class="bi bi-lock" style="margin-right: 5px; color: #777;"></i>17 September 2024 - 13 Oktober 2024
                                </p>
                                <p style="font-size: 13px; color: #777;">
                                    <i class="bi bi-person" style="margin-right: 5px; color: #777;"></i>Dibutuhkan: 0 orang
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Testimonials -->
            <section id="testimonials" class="testimonials section light-background">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>Testimonials</h2>
                    <p>Berikut adalah testimonial langsung dari pengguna yang telah merasakan
                        manfaat dan kemudahan dalam menggunakan web Sumtera Career Center
                    </p>
                </div><!-- End Section Title -->

                <div class="container">
                    <div class="row g-5">
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="testimonial-item">
                                <img src="iLanding/assets/img/testimonials/profile1.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Diana</h3>
                                <h4>Programmer</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Saya merasa sangat terbantu dengan adanya Sumatera Career Center.
                                        Melalui platform ini, saya bisa menemukan berbagai lowongan pekerjaan yang sesuai
                                        dengan keahlian saya di bidang Teknologi Informasi.
                                        Proses pendaftaran dan aplikasi yang mudah membuat saya merasa lebih percaya diri
                                        dalam mencari pekerjaan.
                                        Terima kasih SCC!</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="testimonial-item">
                                <img src="iLanding/assets/img/testimonials/profile2.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Rizky Mahendra</h3>
                                <h4>Staf Pemasaran</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Sebagai seorang fresh graduate di bidang Pemasaran,
                                        saya sangat terbantu dengan adanya informasi lowongan pekerjaan yang up-to-date dari
                                        Sumatera Career Center.
                                        Saya berhasil mendapatkan pekerjaan pertama saya sebagai staf pemasaran di
                                        perusahaan ternama berkat platform ini!</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="testimonial-item">
                                <img src="iLanding/assets/img/testimonials/profile3.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Jena Karlis</h3>
                                <h4>HR Manager</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Sebagai seorang HR, saya sangat terbantu dengan adanya SCC untuk menemukan
                                        kandidat yang sesuai dengan kebutuhan perusahaan. Fitur pencarian dan penyaringan
                                        sangat efisien.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                            <div class="testimonial-item">
                                <img src="iLanding/assets/img/testimonials/profile4.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Matt Brandon</h3>
                                <h4>CEO PT. Sumber Daya Mandiri</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>SCC adalah platform yang sangat membantu bagi perusahaan seperti kami
                                        untuk mencari talenta terbaik di Sumatera.
                                        Kami berhasil menemukan kandidat berkualitas melalui platform ini.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->
                    </div>
                </div>
            </section>
            <!-- /Testimonials Section -->

            <!-- Stats Section -->
            <section id="stats" class="stats section">

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row gy-4">

                        <div class="col-lg-3 col-md-6">
                            <div class="stats-item text-center w-100 h-100">
                                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>Clients</p>
                            </div>
                        </div><!-- End Stats Item -->

                        <div class="col-lg-3 col-md-6">
                            <div class="stats-item text-center w-100 h-100">
                                <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>Projects</p>
                            </div>
                        </div><!-- End Stats Item -->

                        <div class="col-lg-3 col-md-6">
                            <div class="stats-item text-center w-100 h-100">
                                <span data-purecounter-start="0" data-purecounter-end="1453"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Hours Of Support</p>
                            </div>
                        </div><!-- End Stats Item -->

                        <div class="col-lg-3 col-md-6">
                            <div class="stats-item text-center w-100 h-100">
                                <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>Workers</p>
                            </div>
                        </div><!-- End Stats Item -->

                    </div>

                </div>

            </section><!-- /Stats Section -->

            <!-- Services Section -->
            <section id="services" class="services section light-background">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>Services</h2>
                    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
                </div><!-- End Section Title -->

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row g-4">

                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-card d-flex">
                                <div class="icon flex-shrink-0">
                                    <i class="bi bi-activity"></i>
                                </div>
                                <div>
                                    <h3>Nesciunt Mete</h3>
                                    <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus
                                        dolores
                                        iure perferendis tempore et consequatur.</p>
                                    <a href="service-details.html" class="read-more">Read More <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div><!-- End Service Card -->

                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="service-card d-flex">
                                <div class="icon flex-shrink-0">
                                    <i class="bi bi-diagram-3"></i>
                                </div>
                                <div>
                                    <h3>Eosle Commodi</h3>
                                    <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque
                                        eum
                                        hic non ut nesciunt dolorem.</p>
                                    <a href="service-details.html" class="read-more">Read More <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div><!-- End Service Card -->

                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="service-card d-flex">
                                <div class="icon flex-shrink-0">
                                    <i class="bi bi-easel"></i>
                                </div>
                                <div>
                                    <h3>Ledo Markt</h3>
                                    <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id
                                        voluptas adipisci eos earum corrupti.</p>
                                    <a href="service-details.html" class="read-more">Read More <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div><!-- End Service Card -->

                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                            <div class="service-card d-flex">
                                <div class="icon flex-shrink-0">
                                    <i class="bi bi-clipboard-data"></i>
                                </div>
                                <div>
                                    <h3>Asperiores Commodit</h3>
                                    <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea
                                        fuga
                                        sit provident adipisci neque.</p>
                                    <a href="service-details.html" class="read-more">Read More <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div><!-- End Service Card -->

                    </div>

                </div>

            </section><!-- /Services Section -->

            <!-- Faq Section -->
            <section class="faq-9 faq section light-background" id="faq">

                <div class="container">
                    <div class="row">

                        <div class="col-lg-5" data-aos="fade-up">
                            <h2 class="faq-title">Have a question? Check out the FAQ</h2>
                            <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
                                <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
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

                                <form action="forms/contact.php" method="post" class="php-email-form"
                                    data-aos="fade-up" data-aos-delay="200">
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
                                            <input type="text" class="form-control" name="subject"
                                                placeholder="Subjek" required="">
                                        </div>

                                        <div class="col-12">
                                            <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required=""></textarea>
                                        </div>

                                        <div class="col-12 text-center">
                                            <div class="loading">Memuat</div>
                                            <div class="error-message"></div>
                                            <div class="sent-message">Pesan Anda telah dikirim. Terima kasih!</div>

                                            <button type="submit" class="btn">Kirim Pesan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- /Contact Section -->
    </main>
