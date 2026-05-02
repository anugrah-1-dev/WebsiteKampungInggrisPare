<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuswantara Hospitality Center (NHC) - Siap Kerja di Luar Negeri</title>
    
    <link rel="stylesheet" href="<?php echo e(asset('css/nhclandingpage.css')); ?>">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <?php echo $__env->make('navbar.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <section class="hero">
        <div class="carousel">
            <div class="slides">
                <div class="slide active">
                    <img src="<?php echo e(asset('asset/img/brilliant1.jpg')); ?>" alt="Suasana Belajar di NHC Pare">
                </div>
                <div class="slide">
                    <img src="<?php echo e(asset('asset/img/NHC2.png')); ?>" alt="Praktik Perhotelan Internasional">
                </div>
                <div class="slide">
                    <img src="<?php echo e(asset('asset/img/brilliant2.jpg')); ?>" alt="Lulusan NHC Siap Kerja">
                </div>
            </div>
            <button class="prev">&#10094;</button>
            <button class="next">&#10095;</button>
        </div>
        <div class="hero-text">
            <h1>Wujudkan Karir Impianmu di Dunia Perhotelan Internasional!</h1>
            <p>Bingung cari tempat belajar yang singkat, terjangkau, dan mudah dapat kerja di luar negeri? NHC Pare
                solusinya!</p>
            <a href="#program" class="cta-button">Lihat Program Kami</a>
        </div>
    </section>

    
    <section class="program-section bg-light" id="program">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2>Pilihan Program Unggulan</h2>
                <p class="lead text-muted">Tersedia kelas tatap muka yang siap mengantarkan Anda ke pintu gerbang karir
                    profesional.</p>
            </div>
            <div class="filter-buttons-wrapper text-center mb-4" data-aos="fade-up" data-aos-delay="100">
                <button class="filter-btn active" data-filter="offline">Program Tatap Muka</button>
                
                
            </div>
            <div class="program-grid">
                <?php if($offlinePrograms->isEmpty() && $onlinePrograms->isEmpty()): ?>
                    <div style="grid-column: 1 / -1; text-align: center;">
                        <p class="text-muted">Belum ada program yang tersedia saat ini.</p>
                    </div>
                <?php else: ?>
                    
                    <?php $__empty_1 = true; $__currentLoopData = $offlinePrograms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="program-item offline" data-aos="fade-up"
                            data-aos-delay="<?php echo e(($loop->index % 3 + 1) * 100); ?>">
                            <div class="program-card">
                                <div class="program-card-image-wrapper">
                                    <img src="<?php echo e(asset('storage/' . $program->thumbnail)); ?>" class="program-card-img"
                                        alt="<?php echo e($program->nama); ?>">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title program-card-title"><?php echo e($program->nama); ?></h5>

                                    
                                    <p class="card-text text-muted small mb-2">
                                        <i class="fas fa-calendar-alt"></i>
                                        <?php echo e(\Carbon\Carbon::parse($program->jadwal_mulai)->format('M d')); ?> -
                                        <?php echo e(\Carbon\Carbon::parse($program->jadwal_selesai)->format('M d, Y')); ?>

                                    </p>

                                    
                                    <?php
                                        // Cek apakah features_program ada dan tidak null
                                        $features = $program->features_program ?? '';
                                        if (is_string($features)) {
                                            // Coba decode JSON, jika gagal, pecah berdasarkan baris baru
                                            $decoded = json_decode($features, true);
                                            $features = json_last_error() === JSON_ERROR_NONE && is_array($decoded) ? $decoded : explode("\n", $features);
                                        }
                                    ?>

                                    
                                    <?php if(!empty($features) && is_array($features)): ?>
                                        <ul class="small mb-2" style="list-style: none; padding-left: 0;">
                                            <?php $__currentLoopData = array_slice($features, 0, 4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fitur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <?php echo \App\Helpers\FeatureHelper::getFeatureIcon($fitur); ?>

                                                    <?php echo e(trim($fitur)); ?>

                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php else: ?>
                                        <small class="text-muted">Tidak ada fasilitas tersedia</small>
                                    <?php endif; ?>

                                    <p class="card-text program-card-price mb-3 mt-auto">
                                        Rp <?php echo e(number_format($program->harga, 0, ',', '.')); ?>

                                    </p>
                                    <a href="<?php echo e(route('public.program.offline.show', $program->slug)); ?>"
                                        class="btn btn-program">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        
                    <?php endif; ?>



                <?php endif; ?>
            </div>
        </div>
    </section>

    
    <section class="benefits-section" id="benefits">
        <div class="container" data-aos="fade-up">
            <div class="text-center mb-5">
                <h2>Keunggulan Belajar di LPK NHC Pare</h2>
                <p class="lead text-muted">Temukan alasan mengapa LPK NHC Pare adalah pilihan terbaik untuk karir Anda
                    di
                    dunia perhotelan.</p>
            </div>
            <div class="about-grid">
                <div class="about-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-wrapper"><i class="fas fa-book-open"></i></div>
                    <h3>Lingkungan Edukatif</h3>
                    <p>Terletak di kawasan Pare, Kediri (Kampung Inggris), mahasiswa terbiasa dengan suasana yang
                        mendukung penguasaan bahasa asing.</p>
                </div>
                <div class="about-card" data-aos="fade-up" data-aos-delay="150">
                    <div class="icon-wrapper"><i class="fas fa-chalkboard-teacher"></i></div>
                    <h3>Fasilitas Nyaman</h3>
                    <p>Proses belajar didukung oleh ruang kelas yang bersih, nyaman, dan kondusif sehingga Anda lebih
                        fokus dalam memahami materi.</p>
                </div>
                <div class="about-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-wrapper"><i class="fas fa-handshake"></i></div>
                    <h3>Kerja Sama Industri</h3>
                    <p>Kami menjalin kerja sama dengan berbagai hotel ternama sebagai mitra untuk program On the Job
                        Training (OJT).</p>
                </div>
                <div class="about-card" data-aos="fade-up" data-aos-delay="250">
                    <div class="icon-wrapper"><i class="fas fa-globe"></i></div>
                    <h3>Kesempatan Luar Negeri</h3>
                    <p>Kampus bekerja sama dengan lembaga penyalur tenaga kerja internasional, membuka peluang bagi
                        lulusan untuk berkarier di luar negeri.</p>
                </div>
                <div class="about-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon-wrapper"><i class="fas fa-wallet"></i></div>
                    <h3>Biaya Terjangkau</h3>
                    <p>Kami memberikan kualitas pendidikan terbaik dengan biaya yang ramah di kantong, sehingga bisa
                        dijangkau oleh banyak kalangan.</p>
                </div>
                <div class="about-card" data-aos="fade-up" data-aos-delay="350">
                    <div class="icon-wrapper"><i class="fas fa-clock"></i></div>
                    <h3>Waktu Belajar Efisien</h3>
                    <p>Program pendidikan dirancang singkat namun padat, sehingga mahasiswa bisa segera siap kerja
                        dengan keterampilan yang relevan.</p>
                </div>
                <div class="about-card" data-aos="fade-up" data-aos-delay="350">
                    <div class="icon-wrapper"><i class="fas fa-graduation-cap"></i></div>
                    <h3>Program Beasiswa untuk Siswa Berprestasi</h3>
                    <p>LPK NHC Pare memberikan beasiswa khusus bagi siswa yang menunjukkan prestasi akademik maupun
                        non-akademik sebagai bentuk apresiasi dan dukungan terhadap generasi unggul.</p>
                </div>
            </div>
        </div>
    </section>

    <div class="wave-divider">
        <svg viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path class="shape-fill"
                d="M0,224L48,208C96,192,192,160,288,154.7C384,149,480,171,576,186.7C672,203,768,213,864,197.3C960,181,1056,139,1152,122.7C1248,107,1344,117,1392,122.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </div>

    
    <section class="alur" id="persyaratan">
        <div class="container" data-aos="fade-up">
            <h2>Persyaratan Pendaftaran</h2>
            <div class="requirements-grid">
                <div class="step" data-aos="fade-up" data-aos-delay="100">
                    <div class="circle"><i class="fas fa-user-graduate"></i></div>
                    <h3>Pendidikan & Usia</h3>
                    <ul>
                        <li>Lulusan SMA/SMK/MA/Paket C atau sederajat.</li>
                        <li>Usia antara 17 hingga 30 tahun.</li>
                    </ul>
                </div>
                <div class="step" data-aos="fade-up" data-aos-delay="200">
                    <div class="circle"><i class="fas fa-heartbeat"></i></div>
                    <h3>Kesehatan</h3>
                    <ul>
                        <li>Sehat Jasmani & Rohani (Surat Keterangan Sehat).</li>
                        <li>Bebas Narkoba.</li>
                        <li>Tidak buta warna & tidak cacat fisik yang menghambat.</li>
                    </ul>
                </div>
                <div class="step" data-aos="fade-up" data-aos-delay="300">
                    <div class="circle"><i class="fas fa-file-alt"></i></div>
                    <h3>Dokumen</h3>
                    <ul>
                        <li>Fotokopi Ijazah/SKL, KTP, dan Kartu Keluarga.</li>
                        <li>Pas foto berwarna.</li>
                        <li>Surat Keterangan Kelakuan Baik (SKKB).</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    
    <footer class="footer text-center">
        <p>© <?php echo e(date('Y')); ?> Nuswantara Hospitality Center (NHC) Pare. All Rights Reserved.</p>
    </footer>

    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });
        document.addEventListener('DOMContentLoaded', function () {
            const slides = document.querySelectorAll(".hero .slide");
            const prevBtn = document.querySelector(".hero .prev");
            const nextBtn = document.querySelector(".hero .next");
            if (slides.length > 0 && prevBtn && nextBtn) {
                let current = 0;

                function showSlide(index) {
                    slides.forEach((s, i) => s.classList.toggle("active", i === index));
                }

                function nextSlide() {
                    current = (current + 1) % slides.length;
                    showSlide(current);
                }
                nextBtn.addEventListener("click", nextSlide);
                prevBtn.addEventListener("click", () => {
                    current = (current - 1 + slides.length) % slides.length;
                    showSlide(current);
                });
                setInterval(nextSlide, 5000);
                showSlide(current);
            }
            const filterButtons = document.querySelectorAll('.filter-btn');
            const programItems = document.querySelectorAll('.program-item');

            function filterPrograms(filterValue) {
                programItems.forEach(item => {
                    if (item.classList.contains(filterValue)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }
            if (filterButtons.length > 0) {
                filterButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        filterButtons.forEach(btn => btn.classList.remove('active'));
                        this.classList.add('active');
                        const filterValue = this.getAttribute('data-filter');
                        filterPrograms(filterValue);
                    });
                });
            }
            if (programItems.length > 0) {
                const defaultFilter = document.querySelector('.filter-btn.active').getAttribute(
                    'data-filter');
                filterPrograms(defaultFilter);
            }
        });
    </script>
</body>

</html><?php /**PATH /home/u389110718/domains/mykampunginggris.com/kampung_inggris_plus/resources/views/Landingpage/NHC.blade.php ENDPATH**/ ?>