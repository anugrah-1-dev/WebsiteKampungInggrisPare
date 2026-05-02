<?php $__env->startSection('content'); ?>
    <div class="container py-5" id="TrackingTrx">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div id="tracking-section"
                    class="text-center mb-5 text-white d-flex flex-column justify-content-center align-items-center"
                    style="height: 300px; background-size: cover; background-position: center; transition: background-image 1s ease-in-out;">

                    <h1 class="display-5 fw-bold">Tracking Transaksi</h1>
                    <p class="lead">Cek status transaksi dan program Anda dengan mudah</p>
                </div>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        let images = [
                            "<?php echo e(asset('asset/gif/a.gif')); ?>",
                            "<?php echo e(asset('asset/gif/b.gif')); ?>",
                            "<?php echo e(asset('asset/gif/c.gif')); ?>",

                        ];
                        let index = 0;
                        let section = document.getElementById("tracking-section");

                        // Set awal
                        section.style.backgroundImage = `url('${images[index]}')`;

                        // Ganti tiap 5 detik
                        setInterval(() => {
                            index = (index + 1) % images.length;
                            section.style.backgroundImage = `url('${images[index]}')`;
                        }, 5000);
                    });
                </script>

                <?php if(session('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show text-center">
                        <?php echo e(session('error')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="card shadow-sm mb-5">
                    <div class="card-body p-4">
                        <form action="<?php echo e(route('tracking.search')); ?>" method="POST" class="row g-3">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-8">
                                <input type="text" name="trx_id" class="form-control form-control-lg"
                                    placeholder="Masukkan Kode Transaksi (TRX-XXXXXX)" required
                                    value="<?php echo e(old('trx_id', $trx_id ?? '')); ?>">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-lg w-100">
                                    <i class="bi bi-search me-2"></i> Cari
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                
                <?php if(isset($camp)): ?>
                    <div class="card shadow-sm mb-4 border-primary">
                        <div class="card-header bg-primary text-white fw-bold">
                            <i class="bi bi-house-door me-2"></i> Program Camp
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <h5 class="text-muted">Nama Peserta</h5>
                                    <p class="fs-5"><?php echo e($camp->nama_lengkap); ?></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <h5 class="text-muted">Status </h5>
                                    <span
                                        class="badge fs-6
                                                                                                            <?php if($camp->status == 'diterima'): ?> bg-success
                                                                                                            <?php elseif($camp->status == 'pending' || $camp->status == 'diproses'): ?> bg-warning text-dark
                                                                                                            <?php elseif($camp->status == 'ditolak'): ?> bg-danger
                                                                                                            <?php else: ?> bg-secondary <?php endif; ?>">
                                        <?php echo e(ucfirst($camp->status)); ?>

                                    </span>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <h5 class="text-muted">Nama Program</h5>
                                    <?php if($camp): ?>
                                        <p class="fs-5"><?php echo e($camp->program->nama ?? '-'); ?></p>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <h5 class="text-muted">Kamar</h5>
                                    <?php if($camp->status === 'diterima'): ?>
                                        <p class="fs-5"><?php echo e($camp->nama_kamar); ?></p>
                                    <?php else: ?>
                                        <p class="fs-5 text-muted"><em>Kamar sedang diproses oleh admin</em></p>
                                    <?php endif; ?>
                                </div>
                                <?php if($camp->bukti_pembayaran): ?>
                                    <div class="col-md-12 mb-3">
                                        <h5 class="text-muted">Bukti Pembayaran</h5>
                                        <a href="<?php echo e(asset('storage/' . $camp->bukti_pembayaran)); ?>" target="_blank">
                                            <img src="<?php echo e(asset('storage/' . $camp->bukti_pembayaran)); ?>" alt="Bukti Pembayaran"
                                                class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                                        </a>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>

                    </div>
                <?php endif; ?>

                <?php if(isset($offline)): ?>
                    <div class="card shadow-sm mb-4 border-info">
                        <div class="card-header bg-info text-white fw-bold">
                            <i class="bi bi-building me-2"></i> Program Offline
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <h5 class="text-muted">Nama Peserta</h5>
                                    <p class="fs-5"><?php echo e($offline->nama_lengkap); ?></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <h5 class="text-muted">Status Pendaftaran</h5>
                                    <span
                                        class="badge fs-6
                                                                                                                <?php if($offline->status == 'diterima'): ?> bg-success
                                                                                                                <?php elseif($offline->status == 'pending' || $offline->status == 'diproses'): ?> bg-warning text-dark
                                                                                                                <?php elseif($offline->status == 'ditolak'): ?> bg-danger
                                                                                                                <?php else: ?> bg-secondary <?php endif; ?>">
                                        <?php echo e(ucfirst($offline->status)); ?>

                                    </span>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <h5 class="text-muted">Nama Program</h5>
                                    <p class="fs-5"><?php echo e($offline->program->nama ?? '-'); ?></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <h5 class="text-muted">Transportasi</h5>
                                    <p class="fs-5"><?php echo e($offline->transport->name ?? '-'); ?></p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <h5 class="text-muted">Total Harga</h5>

                                    <?php if($offline->payment_method === 'DP'): ?>
                                        <p class="fs-5 mb-1">
                                            <span class="text-decoration-line-through text-muted">
                                                Rp. <?php echo e(number_format($offline->subtotal, 0, ',', '.')); ?>

                                            </span>
                                        </p>
                                        <p class="fs-5 fw-bold text-warning">
                                            Sisa Bayar: Rp.
                                            <?php echo e(number_format($offline->subtotal - $offline->dp_amount, 0, ',', '.')); ?>

                                        </p>
                                        <small class="d-block mt-1 px-2 py-1 rounded"
                                            style="background-color: #fff9c4; color: #7a6b00;">
                                            💡 Sisa pembayaran dapat dilunasi di office Bieplus
                                        </small>
                                    <?php else: ?>
                                        <p class="fs-5">
                                            Rp. <?php echo e(number_format($offline->subtotal, 0, ',', '.')); ?>

                                        </p>
                                    <?php endif; ?>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <h5 class="text-muted">Status Pembayaran</h5>

                                    <?php if($offline->payment_method === 'cicilan'): ?>
                                        
                                        <?php if($offline->cicilan_lunas): ?>
                                            <!-- accessor -->
                                            <span class="badge bg-success fs-6">Pembayaran cicilan Anda telah lunas</span>
                                        <?php else: ?>
                                            <span class="badge bg-warning text-dark fs-6">Pembayaran cicilan belum lunas</span>
                                            <br>
                                            <small class="text-muted">* Silakan lakukan pelunasan cicilan tepat waktu</small>
                                        <?php endif; ?>

                                        <br>
                                        <a href="<?php echo e(route('tracking.show', $offline->trx_id)); ?>"
                                            class="btn btn-sm btn-warning fw-bold">
                                            <i class="bi bi-credit-card me-1"></i> Lihat Detail Pembayaran
                                        </a>
                                    <?php elseif(strtolower($offline->payment_method) === 'dp'): ?>
                                        
                                        <?php if($offline->dp_lunas ?? false): ?>
                                            <!-- accessor atau manual check -->
                                            <span class="badge bg-success fs-6">DP sudah dibayar, transaksi lunas</span>
                                        <?php else: ?>
                                            <span class="badge bg-info text-dark fs-6">
                                                DP dibayar Rp <?php echo e(number_format($offline->dp_amount, 0, ',', '.')); ?>

                                            </span>
                                            <br>
                                            
                                        <?php endif; ?>

                                        <br>
                                        
                                    <?php else: ?>
                                        
                                        <span class="badge bg-success fs-6">Lunas</span>
                                    <?php endif; ?>
                                </div>







                            </div>

                            
                            <?php if($offline->bukti_pembayaran): ?>
                                <div class="row">
                                    <div class="col-12 text-center mt-4">
                                        <h5 class="text-muted">Bukti Pembayaran</h5>
                                        <a href="<?php echo e(asset('storage/' . $offline->bukti_pembayaran)); ?>" target="_blank">
                                            <img src="<?php echo e(asset('storage/' . $offline->bukti_pembayaran)); ?>"
                                                alt="Bukti Pembayaran" class="img-fluid rounded shadow-sm d-block mx-auto"
                                                style="max-height: 300px;">
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>


                <?php if(isset($online)): ?>
                    <div class="card shadow-sm mb-4 border-success">
                        <div class="card-header bg-success text-white fw-bold">
                            <i class="bi bi-laptop me-2"></i> Program Online
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <h5 class="text-muted">Nama Peserta</h5>
                                    <p class="fs-5"><?php echo e($online->nama_lengkap); ?></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <h5 class="text-muted">Status</h5>
                                    <span
                                        class="badge
                                                                                                              <?php if($online->status == 'aktif'): ?> bg-success
                                                                                                               <?php elseif($online->status == 'ditolak'): ?> bg-danger
                                                                                                               <?php else: ?> bg-warning <?php endif; ?> fs-6">
                                        <?php echo e(ucfirst($online->status)); ?>

                                    </span>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <h5 class="text-muted">Program</h5>
                                    <?php if($online): ?>
                                        <p class="fs-5"><?php echo e($online->program->nama ?? '-'); ?></p>
                                    <?php endif; ?>

                                </div>

                                <div class="col-md-12 mb-3">
                                    <h5 class="text-muted">Total Harga</h5>
                                    <p class="fs-5">
                                        Rp. <?php echo e(number_format($online->subtotal, 0, ',', '.')); ?>

                                    </p>
                                </div>

                            </div>
                            <?php if($online->bukti_pembayaran): ?>
                                <div class="col-md-12 mb-3">
                                    <h5 class="text-muted">Bukti Pembayaran</h5>
                                    <a href="<?php echo e(asset('storage/bukti_pembayaran/' . $online->bukti_pembayaran)); ?>"
                                        target="_blank">
                                        <img src="<?php echo e(asset('storage/bukti_pembayaran/' . $online->bukti_pembayaran)); ?>"
                                            alt="Bukti Pembayaran" class="img-fluid rounded shadow-sm"
                                            style="max-height: 300px;">
                                    </a>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                <?php endif; ?>

                <?php if(isset($camp) || isset($offline) || isset($online)): ?>
                    <div class="text-center mt-4">
                        <a href="<?php echo e(route('tracking.index')); ?>" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-2"></i> Cari Transaksi Lain
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(session('success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '<?php echo e(session('success')); ?>',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
<?php endif; ?>

<?php if(session('error')): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '<?php echo e(session('error')); ?>',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
<?php endif; ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389110718/domains/biepluskampunginggris.com/kampung_inggris_plus/resources/views/tracking/index.blade.php ENDPATH**/ ?>