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
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-trophy"></i>
                        </div>
                        <div class="stat-content">
                            <h4>3x Won Awards</h4>
                            <p class="mb-0">Vestibulum ante ipsum</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-briefcase"></i>
                        </div>
                        <div class="stat-content">
                            <h4>6.5k Faucibus</h4>
                            <p class="mb-0">Nullam quis ante</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <div class="stat-content">
                            <h4>80k Mauris</h4>
                            <p class="mb-0">Etiam sit amet orci</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <div class="stat-content">
                            <h4>6x Phasellus</h4>
                            <p class="mb-0">Vestibulum ante ipsum</p>
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
                            <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1"
                                class="purecounter"></span>
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

    </section><!-- /Hero Section -->

    <!-- Features Cards Section -->
    <section id="features-cards" class="features-cards section">

        <div class="container">

            <div class="row gy-4">

                <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                    <div
                        style="border: 1px solid #ddd; border-radius: 10px; width: 100%; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                        <img src="iLanding/assets/img/programmer.jpg" alt="Poster Programmer"
                            style="width: 100%; height: 150px; object-fit: cover;">
                        <div style="padding: 15px; text-align: left;">
                            <h4 style="margin-bottom: 10px; font-size: 18px;">
                                <center><a href="LowonganDetail1.html" style="text-decoration: none; color: black;"
                                        onmouseover="this.style.color='blue'"
                                        onmouseout="this.style.color='black'">Programmer</a> </center>
                            </h4>
                            <p style="font-size: 14px; color: #555; margin: 5px 0;">
                                <i class="bi bi-building" style="margin-right: 5px; color: #555;"></i>POLITEKNIK
                                CALTEX RIAU
                            </p>
                            <p style="font-size: 13px; color: #777; margin: 5px 0;">
                                <i class="bi bi-lock" style="margin-right: 5px; color: #777;"></i>17 September 2024 -
                                13 Oktober 2024
                            </p>
                            <p style="font-size: 13px; color: #777;">
                                <i class="bi bi-person" style="margin-right: 5px; color: #777;"></i>Dibutuhkan: 0
                                orang
                            </p>
                        </div>
                    </div>
                </div><!-- End Feature Borx-->

                <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div
                        style="border: 1px solid #ddd; border-radius: 10px; width: 100%; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
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
                                <i class="bi bi-lock" style="margin-right: 5px; color: #777;"></i>17 September 2024 -
                                13 Oktober 2024
                            </p>
                            <p style="font-size: 13px; color: #777;">
                                <i class="bi bi-person" style="margin-right: 5px; color: #777;"></i>Dibutuhkan: 0
                                orang
                            </p>
                        </div>
                    </div>

                </div><!-- End Feature Borx-->

                <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div
                        style="border: 1px solid #ddd; border-radius: 10px; width: 100%; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                        <img src="iLanding/assets/img/staf_administrasi.png" alt="Poster Staf Administrasi"
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
                                <i class="bi bi-lock" style="margin-right: 5px; color: #777;"></i>17 September 2024 -
                                13 Oktober 2024
                            </p>
                            <p style="font-size: 13px; color: #777;">
                                <i class="bi bi-person" style="margin-right: 5px; color: #777;"></i>Dibutuhkan: 0
                                orang
                            </p>
                        </div>
                    </div><!-- End Feature Borx-->

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
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
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

            <h2>Tentang Kami</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
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
                            <img src="assets/img/features-illustration-2.webp" alt="" class="img-fluid">
                        </div>
                    </div>
                </div><!-- End tab content item -->

            </div>

        </div>

    </section><!-- /Features Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section">

        <!-- Abstract Background Elements -->
        <div class="shape shape-1">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M47.1,-57.1C59.9,-45.6,68.5,-28.9,71.4,-10.9C74.2,7.1,71.3,26.3,61.5,41.1C51.7,55.9,35,66.2,16.9,69.2C-1.3,72.2,-21,67.8,-36.9,57.9C-52.8,48,-64.9,32.6,-69.1,15.1C-73.3,-2.4,-69.5,-22,-59.4,-37.1C-49.3,-52.2,-32.8,-62.9,-15.7,-64.9C1.5,-67,34.3,-68.5,47.1,-57.1Z"
                    transform="translate(100 100)"></path>
            </svg>
        </div>

        <div class="shape shape-2">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M41.3,-49.1C54.4,-39.3,66.6,-27.2,71.1,-12.1C75.6,3,72.4,20.9,63.3,34.4C54.2,47.9,39.2,56.9,23.2,62.3C7.1,67.7,-10,69.4,-24.8,64.1C-39.7,58.8,-52.3,46.5,-60.1,31.5C-67.9,16.4,-70.9,-1.4,-66.3,-16.6C-61.8,-31.8,-49.7,-44.3,-36.3,-54C-22.9,-63.7,-8.2,-70.6,3.6,-75.1C15.4,-79.6,28.2,-58.9,41.3,-49.1Z"
                    transform="translate(100 100)"></path>
            </svg>
        </div>

        <!-- Dot Pattern Groups -->
        <div class="dots dots-1">
            <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <pattern id="dot-pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                    <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                </pattern>
                <rect width="100" height="100" fill="url(#dot-pattern)"></rect>
            </svg>
        </div>

        <div class="dots dots-2">
            <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <pattern id="dot-pattern-2" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                    <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                </pattern>
                <rect width="100" height="100" fill="url(#dot-pattern-2)"></rect>
            </svg>
        </div>

        <div class="shape shape-3">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M43.3,-57.1C57.4,-46.5,71.1,-32.6,75.3,-16.2C79.5,0.2,74.2,19.1,65.1,35.3C56,51.5,43.1,65,27.4,71.7C11.7,78.4,-6.8,78.3,-23.9,72.4C-41,66.5,-56.7,54.8,-65.4,39.2C-74.1,23.6,-75.8,4,-71.7,-13.2C-67.6,-30.4,-57.7,-45.2,-44.3,-56.1C-30.9,-67,-15.5,-74,0.7,-74.9C16.8,-75.8,33.7,-70.7,43.3,-57.1Z"
                    transform="translate(100 100)"></path>
            </svg>
        </div>
        </div>

        </div>

    </section><!-- /Call To Action Section -->

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
                            <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores
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
                            <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum
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
                            <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga
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
                    <h2 class="faq-title">Punya pertanyaan? Silahkan lihat FAQ</h2>
                    <p class="faq-description">Berikut merupakan beberapa pertanyaan yang sering di tanyakan</p>
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
                            <h3>Apa saja yang peru di persiapkan untuk melamar di sebuah perusahaan?</h3>
                            <div class="faq-content">
                                <p>Untuk melamar di sebuah perusahaan hal yang harus di persiapkan adalah.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Feugiat scelerisque varius morbi enim nunc faucibus?</h3>
                            <div class="faq-content">
                                <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum
                                    velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend
                                    donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in
                                    cursus turpis massa tincidunt dui.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                            <div class="faq-content">
                                <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus
                                    pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit.
                                    Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis
                                    tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
                            <div class="faq-content">
                                <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum
                                    velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend
                                    donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in
                                    cursus turpis massa tincidunt dui.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Tempus quam pellentesque nec nam aliquam sem et tortor?</h3>
                            <div class="faq-content">
                                <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in
                                    est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl
                                    suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
                            <div class="faq-content">
                                <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed in
                                    suscipit sequi. Distinctio ipsam dolore et.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                    </div>
                </div>

            </div>
        </div>
    </section><!-- /Faq Section -->

    <!-- Call To Action 2 Section -->
    <section id="call-to-action-2" class="call-to-action-2 section dark-background">

        <div class="container">
            <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                <div class="col-xl-10">
                    <div class="text-center">
                        <h3>Call To Action</h3>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.</p>
                        <a class="cta-btn" href="#">Call To Action</a>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /Call To Action 2 Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-4 g-lg-5">
                <div class="col-lg-5">
                    <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                        <h3>Contact Info</h3>
                        <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum
                            primis.</p>

                        <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div class="content">
                                <h4>Lokasi Kami</h4>
                                <p>Jl. Umban Sari (Patin) No.1 Rumbai</p>
                                <p>Pekanbaru-Riau</p>
                            </div>
                        </div>

                        <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon-box">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <div class="content">
                                <h4>Phone Number</h4>
                                <p>+1 5589 55488 55</p>
                                <p>+1 6678 254445 41</p>
                            </div>
                        </div>

                        <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                            <div class="icon-box">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div class="content">
                                <h4>Email Address</h4>
                                <p>info@example.com</p>
                                <p>contact@example.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
                        <h3>Get In Touch</h3>
                        <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum
                            primis.</p>

                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Nama" required="">
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Email" required="">
                                </div>

                                <div class="col-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        required="">
                                </div>

                                <div class="col-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                                </div>

                                <div class="col-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

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
