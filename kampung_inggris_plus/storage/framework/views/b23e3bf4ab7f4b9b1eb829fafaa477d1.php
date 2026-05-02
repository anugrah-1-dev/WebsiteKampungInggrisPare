<!-- Navbar -->
<link rel="stylesheet" href="<?php echo e(asset('css/navbar.css')); ?>">
<script>
    const logo1URL = "<?php echo e(asset('asset/img/bietest.png')); ?>";
    const logo2URL = "<?php echo e(asset('asset/img/bietest.png')); ?>";
</script>
<script src="<?php echo e(asset('js/landingpage.js')); ?>"></script>
<!-- Navbar css-->
<link rel="stylesheet" href="<?php echo e(asset('css/nvbr.css')); ?>">


<nav id="navbar">

    <div class="logo">
        <a href="<?php echo e(route('landing')); ?>">
            <?php if(request()->routeIs('program.arab')): ?>
                <img src="<?php echo e(asset('asset/img/alsaeid logo.png')); ?>" alt="Logo Arab" style="height: 130px;">
            <?php elseif(request()->routeIs('program.mandarin')): ?>
                <img src="<?php echo e(asset('asset/img/MandarinLogo.png')); ?>" alt="Logo Mandarin" style="height: 240px;">
            <?php elseif(request()->routeIs('program.jerman')): ?>
                <img src="<?php echo e(asset('asset/img/JermanLogo.png')); ?>" alt="Logo Jerman" style="height: 95px;">
            <?php elseif(request()->routeIs('landing.nhc')): ?>
                <img src="<?php echo e(asset('asset/img/logonhc.png')); ?>" alt="Logo NHC" style="height: 95px;">
            <?php else: ?>
                <img src="<?php echo e(asset('asset/img/bietest.png')); ?>" alt="Logo Default" style="height: 90px;">
            <?php endif; ?>
        </a>
    </div>




    <div class="burger" onclick="toggleNavbar()">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="nav-links" id="navLinks">

        <div class="dropdown" id="programDropdown">
            <button class="dropbtn">
                PROGRAM <span class="arrow">▼</span>
            </button>
            <div class="dropdown-content">
                <a href="<?php echo e(route('program.inggris')); ?>">Bahasa Inggris</a>
                <a href="<?php echo e(route('program.jerman')); ?>">Bahasa Jerman</a>
                <a href="<?php echo e(route('program.mandarin')); ?>">Bahasa Mandarin</a>
                <a href="<?php echo e(route('program.arab')); ?>">Bahasa Arab</a>
                <a href="<?php echo e(route('landing.nhc')); ?>">NHC</a>


            </div>
        </div>


        <div class="dropdown" id="programDropdown">
            <button class="dropbtn">
                GALERI<span class="arrow">▼</span>
            </button>
            <div class="dropdown-content">
                <a href="<?php echo e(url('/#galeri')); ?>">Galeri</a>
                <a href="<?php echo e(url('/#sosmed')); ?>">Social Media</a>

            </div>
        </div>

        <a href="<?php echo e(url('/#camp')); ?>">CAMP</a>
        
        <a href="<?php echo e(url('/#kontak')); ?>">KONTAK</a>
        <a href="<?php echo e(url('/#tentang')); ?>">TENTANG KAMI</a>
        <a href="<?php echo e(route('tracking.index')); ?>" class="btn">Tracking Transaksi</a>
    </div>
</nav>
<script>
    // Navbar scroll effect
    window.addEventListener('scroll', function () {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Dropdown functionality (support multiple dropdowns)
    document.addEventListener('DOMContentLoaded', function () {
        const dropdowns = document.querySelectorAll('.dropdown');

        dropdowns.forEach(dropdown => {
            const button = dropdown.querySelector('.dropbtn');

            if (button) {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    // Tutup semua dropdown lain dulu
                    dropdowns.forEach(d => {
                        if (d !== dropdown) d.classList.remove('active');
                    });

                    // Toggle dropdown yang diklik
                    dropdown.classList.toggle('active');
                });
            }
        });

        // Close all dropdowns when clicking outside
        document.addEventListener('click', function (e) {
            dropdowns.forEach(dropdown => {
                if (!dropdown.contains(e.target)) {
                    dropdown.classList.remove('active');
                }
            });
        });

        // Close dropdown when item is selected
        document.querySelectorAll('.dropdown-content a').forEach(item => {
            item.addEventListener('click', function () {
                dropdowns.forEach(d => d.classList.remove('active'));
            });
        });
    });

    // Mobile navbar toggle
    function toggleNavbar() {
        const navLinks = document.getElementById('navLinks');
        navLinks.classList.toggle('active');
    }
</script><?php /**PATH /home/u389110718/domains/biepluskampunginggris.com/kampung_inggris_plus/resources/views/navbar/nav.blade.php ENDPATH**/ ?>