<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?php echo e($program->nama); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- jQuery UI Autocomplete Stylesheet -->

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
</head>

<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="text-center mb-4">
                    <h1 class="fw-bold"><?php echo e($program->nama); ?></h1>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <?php if($program->thumbnail): ?>
                                    <div class="text-center mb-3">

                                        <img src="<?php echo e(asset('storage/' . $program->thumbnail)); ?>"
                                            class="img-fluid rounded" alt="<?php echo e($program->nama); ?>">
                                    </div>
                                <?php endif; ?>

                                <table class="table table-bordered">
                                    <tr>
                                        <th class="bg-light">Harga</th>
                                        <td>Rp <?php echo e(number_format($program->harga, 0, ',', '.')); ?></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Jadwal</th>
                                        <td><?php echo e(\Carbon\Carbon::parse($program->jadwal_mulai)->format('d M Y')); ?> -

                                            <?php echo e(\Carbon\Carbon::parse($program->jadwal_selesai)->format('d M Y')); ?></td>

                                    </tr>
                                    <tr>
                                        <th class="bg-light">Kuota</th>
                                        <td><?php echo e($program->kuota); ?></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Fasilitas</th>
                                        <td>
                                            <?php
                                                $features = $program->features_program;
                                                if (is_string($features)) {
                                                    $decoded = json_decode($features, true);

                                                    $features =
                                                        json_last_error() === JSON_ERROR_NONE && is_array($decoded)
                                                            ? $decoded
                                                            : explode("\n", $features);
                                                }
                                            ?>

                                            <?php if(!empty($features) && is_array($features)): ?>
                                                <ul class="list-unstyled mb-0">
                                                    <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fitur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li><?php echo e(\App\Helpers\FeatureHelper::getFeatureIcon($fitur)); ?>

                                                            <?php echo e(trim($fitur)); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            <?php else: ?>
                                                <em>Tidak ada fasilitas tersedia.</em>
                                            <?php endif; ?>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th class="bg-light">Status</th>
                                        <td>
                                            <?php if($program->is_active): ?>
                                                <span class="badge bg-success">Aktif</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">Tidak Aktif</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-primary shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Formulir Pendaftaran</h5>
                            </div>
                            <div class="card-body">
                                <p class="text-muted mb-3">Silakan lengkapi data diri Anda untuk mendaftar program ini.
                                </p>
                                <div class="card-body">

                                    <?php if(session('success')): ?>
                                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                                    <?php endif; ?>

                                    <?php

                                        $activePeriods = $periods->where('is_active', 1);
                                    ?>

                                    <form method="POST"
                                        action="<?php echo e(route('public.program.offline.daftar', $program->slug)); ?>"
                                        enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="mb-3">
                                            <label class="form-label"><i class="bi bi-person-fill"></i> Nama
                                            </label>
                                            <input type="text" name="nama_lengkap" class="form-control"
                                                value="<?php echo e(old('nama_lengkap')); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row g-2">
                                                <!-- Kolom Tempat Lahir -->
                                                <div class="col-6">
                                                    <label class="form-label d-block">
                                                        <i class="bi bi-geo-alt-fill"></i> Tempat Lahir
                                                    </label>
                                                    <input type="text" name="tempat_lahir" class="form-control"
                                                        value="<?php echo e(old('tempat_lahir')); ?>"
                                                        placeholder="Contoh: Surabaya" required>
                                                </div>

                                                <!-- Kolom Tanggal Lahir -->
                                                <div class="col-6">
                                                    <label class="form-label d-block">
                                                        <i class="bi bi-calendar-event-fill"></i> Tanggal Lahir
                                                    </label>
                                                    <input type="date" name="tanggal_lahir" class="form-control"
                                                        value="<?php echo e(old('tanggal_lahir')); ?>" required>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label"><i class="bi bi-gender-ambiguous"></i>
                                                Gender</label>
                                            <select name="gender" class="form-select" required>
                                                <option value="" disabled selected>-- Pilih Gender --</option>
                                                <option value="Laki-laki"
                                                    <?php echo e(old('gender') == 'Laki-laki' ? 'selected' : ''); ?>>Laki-laki
                                                </option>
                                                <option value="Perempuan"
                                                    <?php echo e(old('gender') == 'Perempuan' ? 'selected' : ''); ?>>Perempuan
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"><i class="bi bi-telephone-fill"></i> No.
                                                HP</label>
                                            <input type="text" name="no_hp" class="form-control"
                                                value="<?php echo e(old('no_hp')); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"><i class="bi bi-geo-alt-fill"></i> Kota
                                                asal</label>
                                            <input type="text" name="asal_kota" class="form-control"
                                                value="<?php echo e(old('asal_kota')); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"><i class="bi bi-envelope-fill"></i> Email</label>
                                            <input type="email" name="email" class="form-control"
                                                value="<?php echo e(old('email')); ?>" required>
                                        </div>


                                        
                                        
                                        <?php if(in_array(strtolower($program->program_bahasa), ['nhc', 'inggris', 'mandarin', 'jerman'])): ?>
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <i class="bi bi-tag"></i> Ukuran Seragam
                                                </label>
                                                <select name="ukuran_seragam" class="form-select" required>
                                                    <option value="">Pilih Ukuran Seragam</option>
                                                    <option value="S"
                                                        <?php echo e(old('ukuran_seragam') == 'S' ? 'selected' : ''); ?>>S</option>
                                                    <option value="M"
                                                        <?php echo e(old('ukuran_seragam') == 'M' ? 'selected' : ''); ?>>M</option>
                                                    <option value="L"
                                                        <?php echo e(old('ukuran_seragam') == 'L' ? 'selected' : ''); ?>>L</option>
                                                    <option value="XL"
                                                        <?php echo e(old('ukuran_seragam') == 'XL' ? 'selected' : ''); ?>>XL
                                                    </option>
                                                    <option value="XXL"
                                                        <?php echo e(old('ukuran_seragam') == 'XXL' ? 'selected' : ''); ?>>XXL
                                                    </option>
                                                </select>
                                            </div>
                                        <?php endif; ?>

                                        
                                        <div class="mb-3">
                                            <label class="form-label"><i class="bi bi-person-lines-fill"></i> No. HP
                                                Wali</label>
                                            <input type="text" name="no_wali" class="form-control"
                                                value="<?php echo e(old('no_wali')); ?>">
                                        </div>

                                        <?php if(strtolower($program->program_bahasa) === 'arab'): ?>
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <i class="bi bi-house-fill"></i> Akomodasi (Camp Reguler) -
                                                    Optional
                                                </label>
                                                <select name="akomodasi" class="form-select" id="campSelect">
                                                    <option value="" data-harga="0">Pilih Akomodasi (Opsional)
                                                    </option>
                                                    <option value="reguler" data-harga="180000">Reguler (Rp 180.000)
                                                    </option>
                                                </select>
                                            </div>
                                        <?php endif; ?>


                                        
                                        


                                        



                                        

                                        






                                        <br>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">
                                                <i class="bi bi-wallet2"></i> Metode Pembayaran
                                            </label>
                                            <div class="d-flex flex-wrap gap-3">

                                                
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="payment_type" id="pay_tunai" value="tunai"
                                                        <?php echo e(old('payment_type') == 'tunai' ? 'checked' : ''); ?> required>
                                                    <label class="form-check-label" for="pay_tunai">Bayar Tunai
                                                        (Cash)</label>
                                                </div>

                                                
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="payment_type" id="pay_transfer" value="transfer"
                                                        <?php echo e(old('payment_type') == 'transfer' ? 'checked' : ''); ?>

                                                        required>
                                                    <label class="form-check-label" for="pay_transfer">Transfer
                                                        Bank</label>
                                                </div>
                                                <!-- Skema pembayaran (hanya muncul untuk non-tunai & program NHC) -->
                                                <div class="mb-3" id="skemaContainer" style="display: none;">
                                                    <div class="card border-primary shadow-sm">
                                                        <div class="card-header bg-primary text-white fw-bold">
                                                            <i class="bi bi-card-checklist"></i> Pilih Skema Pembayaran
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="d-flex flex-column gap-3" id="paymentOptions">
                                                                <!-- Full Payment -->
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="payment_method" id="pay_full"
                                                                        value="full" checked>
                                                                    <label class="form-check-label fw-bold"
                                                                        for="pay_full">
                                                                        💰 Full Payment (<span id="fullAmount"></span>)
                                                                    </label>
                                                                </div>
                                                                <!-- DP -->
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="payment_method" id="pay_dp"
                                                                        value="dp" data-dp="500000">
                                                                    <label class="form-check-label" for="pay_dp">
                                                                        💳 Bayar DP Rp <span
                                                                            class="fw-bold">500.000</span> —
                                                                        Sisa <span id="sisaDP"></span>
                                                                    </label>
                                                                    <small class="d-block mt-1 poppins-text"
                                                                        style="font-size: 0.85em;">
                                                                        Pelunasan dilakukan di office Bieplus
                                                                    </small>
                                                                </div>


                                                                <style>
                                                                    /* Tambahan CSS */
                                                                    .poppins-text {
                                                                        font-family: 'Poppins', sans-serif;
                                                                    }
                                                                </style>
                                                                <!-- Hidden input untuk tenor cicilan -->
                                                                

                                                                <!-- Cicilan 2 Bulan -->
                                                                

                                                                <!-- Cicilan 6 Bulan -->
                                                                

                                                                <!-- Cicilan 10 Bulan -->
                                                                



                                                            </div>

                                                            <div id="noteCicilan" class="form-text mt-3 text-muted"
                                                                style="display: none;">
                                                                Jika memilih cicilan, Anda wajib membayar DP terlebih
                                                                dahulu.
                                                                Sisa akan dibayar sesuai jumlah bulan yang dipilih.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <script>
                                                    document.addEventListener("DOMContentLoaded", function() {
                                                        const totalHarga = <?php echo e($program->harga); ?>; // harga program dari backend
                                                        const radios = document.querySelectorAll('input[name="payment_method"]');
                                                        const totalPreview = document.getElementById("totalPreview");
                                                        const dpRadio = document.getElementById("pay_dp");
                                                        const sisaDPSpan = document.getElementById("sisaDP");

                                                        // Inisialisasi sisa DP di label
                                                        if (dpRadio && sisaDPSpan) {
                                                            const dpAmount = 500000; // FIXED
                                                            const sisa = totalHarga - dpAmount;
                                                            sisaDPSpan.textContent = "Rp " + sisa.toLocaleString("id-ID");
                                                        }

                                                        // Event listener ketika radio berubah
                                                        radios.forEach(radio => {
                                                            radio.addEventListener("change", function() {
                                                                if (this.value === "full") {
                                                                    totalPreview.textContent = "Rp " + totalHarga.toLocaleString("id-ID");

                                                                } else if (this.value === "cicilan") {
                                                                    const cicilanDP = totalHarga / 2; // cicilan tetap setengah
                                                                    totalPreview.textContent = "DP Rp " + cicilanDP.toLocaleString("id-ID");

                                                                } else if (this.value === "dp") {
                                                                    const dpAmount = 500000; // FIXED
                                                                    totalPreview.textContent = "DP Rp " + dpAmount.toLocaleString("id-ID");
                                                                }

                                                            });
                                                        });
                                                    });
                                                </script>



                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        function toggleSkema() {
                                                            const selectedChannel = document.querySelector('input[name="payment_type"]:checked');
                                                            const skema = document.getElementById('skemaContainer');
                                                            const note = document.getElementById('noteCicilan');
                                                            // Kondisi: tampilkan hanya jika non-tunai dan program = NHC
                                                            const isNonTunai = selectedChannel && (selectedChannel.value === 'transfer' || selectedChannel
                                                                .value === 'qris');
                                                            // Tampilkan skema hanya jika program adalah NHC — gunakan data dari blade
                                                            const isNHC = "<?php echo e(strtolower($program->program_bahasa)); ?>" === 'nhc';
                                                            if (isNonTunai && isNHC) {
                                                                skema.style.display = 'block';
                                                            } else {
                                                                skema.style.display = 'none';
                                                                note.style.display = 'none';
                                                            }
                                                        }

                                                        document.querySelectorAll('input[name="payment_type"]').forEach(r => r.addEventListener('change',
                                                            toggleSkema));
                                                        document.getElementById('payment_method')?.addEventListener('change', function() {
                                                            document.getElementById('noteCicilan').style.display = this.value === 'cicilan' ? 'block' :
                                                                'none';
                                                        });

                                                        toggleSkema(); // initial
                                                    });
                                                </script>

                                                
                                                <script>
                                                    document.addEventListener("DOMContentLoaded", function() {
                                                        const hargaProgram = <?php echo e($program->harga ?? 0); ?>; // harga dari backend
                                                        const pajak = 0.00; // contoh 5% per bulan

                                                        // Hitung Full Payment
                                                        document.getElementById("fullAmount").innerText = formatRupiah(hargaProgram);

                                                        // Hitung DP & cicilan
                                                        function hitungCicilan(bulan, dpElement, sisaElement) {
                                                            const dp = hargaProgram / 2;
                                                            let sisa = hargaProgram - dp;
                                                            let bunga = sisa * pajak * bulan; // total bunga
                                                            sisa += bunga;
                                                            const perBulan = sisa / bulan;

                                                            document.getElementById(dpElement).innerText = formatRupiah(dp);
                                                            if (sisaElement.includes("cicil")) {
                                                                document.getElementById(sisaElement).innerText = formatRupiah(perBulan) + " x" + bulan;
                                                            } else {
                                                                document.getElementById(sisaElement).innerText = formatRupiah(sisa);
                                                            }
                                                        }

                                                        hitungCicilan(2, "dp2", "sisa2");
                                                        // hitungCicilan(6, "dp6", "cicil6");
                                                        // hitungCicilan(10, "dp10", "cicil10");

                                                        function formatRupiah(angka) {
                                                            return "Rp" + angka.toLocaleString("id-ID");
                                                        }

                                                        // // Tampilkan note cicilan kalau pilih cicilan
                                                        // document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
                                                        //     radio.addEventListener("change", function() {
                                                        //         const note = document.getElementById("noteCicilan");
                                                        //         if (this.value !== "full") {
                                                        //             note.style.display = "block";
                                                        //         } else {
                                                        //             note.style.display = "none";
                                                        //         }
                                                        //     });
                                                        // });

                                                        document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
                                                            radio.addEventListener('change', function() {
                                                                const note = document.getElementById('noteCicilan');
                                                                if (this.value === 'cicilan') {
                                                                    document.getElementById('installment_months').value = this.dataset.months;
                                                                    note.style.display = 'block';
                                                                } else {
                                                                    document.getElementById('installment_months').value = '';
                                                                    note.style.display = 'none';
                                                                }
                                                            });
                                                        });


                                                    });
                                                </script>


                                                
                                                <?php if(strtolower($program->program_bahasa) === 'mandarin'): ?>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="payment_type" id="pay_qris" value="qris"
                                                            <?php echo e(old('payment_type') == 'qris' ? 'checked' : ''); ?>

                                                            required>
                                                        <label class="form-check-label" for="pay_qris">QRIS</label>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>


                                        <div class="mb-3" id="bankDropdown" style="display: none;">
                                            <label class="form-label fw-bold"><i class="bi bi-bank"></i> Pilih Bank
                                                Tujuan</label>
                                            <select name="bank_id" class="form-select"
                                                <?php echo e(old('payment_type') == 'transfer' ? 'required' : ''); ?>>
                                                <option value="">-- Pilih Bank --</option>
                                                <?php if(isset($banks) && $banks->isNotEmpty()): ?>
                                                    <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($bank->id); ?>"
                                                            <?php echo e(old('bank_id') == $bank->id ? 'selected' : ''); ?>>
                                                            <?php echo e($bank->name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label"><i class="bi bi-bus-front-fill"></i>
                                                Transportasi
                                                (Optional)</label>
                                            <select name="transport_id" class="form-select" id="transportSelect">
                                                <option value="" data-harga="0">Pilih Transportasi </option>
                                                <?php $__currentLoopData = $transports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($transport->id); ?>"
                                                        data-harga="<?php echo e($transport->price); ?>">
                                                        <?php echo e($transport->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        
                                        <div
                                            class="d-flex align-items-center border rounded p-3 bg-light mt-3 shadow-sm">
                                            <strong class="me-2">Total:</strong>
                                            <span id="totalPreview" class="fw-bold text-success">
                                                Rp<?php echo e(number_format($program->harga, 0, ',', '.')); ?>

                                            </span>

                                            <a href="javascript:void(0)" id="btnLihatTotal"
                                                class="ms-auto btn btn-sm btn-outline-primary rounded-pill px-3">
                                                Lihat Detail
                                            </a>
                                        </div>

                                        
                                        <div class="modal fade" id="modalTotal" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-sm">
                                                <div class="modal-content rounded-3 shadow-lg">
                                                    <div class="modal-header border-0">
                                                        <h5 class="modal-title fw-bold">Rincian Pembayaran</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="d-flex justify-content-between mb-2">
                                                            <span>Harga Program</span>
                                                            <span id="hargaProgram">
                                                                Rp<?php echo e(number_format($program->harga, 0, ',', '.')); ?>

                                                            </span>
                                                        </div>

                                                        <div class="text-end mt-1" id="noteTotal"></div>

                                                        <div class="d-flex justify-content-between mb-2">
                                                            <span>Transportasi</span>
                                                            <span id="hargaTransport">Rp0</span>
                                                        </div>

                                                        <?php if(strtolower($program->program_bahasa) === 'arab'): ?>
                                                            <div class="d-flex justify-content-between mb-2">
                                                                <span>Akomodasi Camp (Reguler)</span>
                                                                <span id="hargaCamp">Rp0</span>
                                                            </div>
                                                        <?php endif; ?>

                                                        <hr>
                                                        <div
                                                            class="d-flex justify-content-between fw-bold fs-5 text-primary">
                                                            <span>Total</span>
                                                            <span id="totalModal">
                                                                Rp<?php echo e(number_format($program->harga, 0, ',', '.')); ?>

                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            document.addEventListener("DOMContentLoaded", function() {
                                                let basePrice = <?php echo e($program->harga); ?>;
                                                let selectTransport = document.getElementById("transportSelect");
                                                let selectCamp = document.getElementById("campSelect");
                                                let btnLihatTotal = document.getElementById("btnLihatTotal");

                                                let hargaProgram = document.getElementById("hargaProgram");
                                                let hargaTransport = document.getElementById("hargaTransport");
                                                let hargaCamp = document.getElementById("hargaCamp");
                                                let totalPreview = document.getElementById("totalPreview");
                                                let totalModal = document.getElementById("totalModal");

                                                let noteTotal = document.getElementById("noteTotal") ?? null;

                                                let paymentRadios = document.querySelectorAll('input[name="payment_method"]');
                                                let currentPayment = "full";

                                                let total = basePrice;

                                                function updateTotal() {
                                                    let transportPrice = selectTransport?.selectedOptions[0]?.dataset.harga ?
                                                        parseInt(selectTransport.selectedOptions[0].dataset.harga) : 0;

                                                    let campPrice = selectCamp?.selectedOptions[0]?.dataset.harga ?
                                                        parseInt(selectCamp.selectedOptions[0].dataset.harga) : 0;

                                                    total = basePrice + transportPrice + campPrice;

                                                    // update preview total (default: harga full)
                                                    totalPreview.textContent = "Rp" + total.toLocaleString('id-ID');
                                                    totalPreview.classList.remove("text-warning");
                                                    totalPreview.classList.add("text-success");

                                                    // update detail modal
                                                    hargaProgram.textContent = "Rp" + basePrice.toLocaleString('id-ID');
                                                    hargaTransport.textContent = "Rp" + transportPrice.toLocaleString('id-ID');
                                                    if (hargaCamp) {
                                                        hargaCamp.textContent = "Rp" + campPrice.toLocaleString('id-ID');
                                                    }

                                                    updateTotalModal();
                                                }

                                                function updateTotalModal() {
                                                    let transportPrice = selectTransport?.selectedOptions[0]?.dataset.harga ?
                                                        parseInt(selectTransport.selectedOptions[0].dataset.harga) : 0;

                                                    let campPrice = selectCamp?.selectedOptions[0]?.dataset.harga ?
                                                        parseInt(selectCamp.selectedOptions[0].dataset.harga) : 0;

                                                    if (currentPayment === "full") {
                                                        hargaProgram.classList.remove("text-decoration-line-through");
                                                        hargaProgram.textContent = "Rp" + basePrice.toLocaleString('id-ID');

                                                        totalModal.textContent = "Rp" + (basePrice + transportPrice + campPrice).toLocaleString(
                                                            'id-ID');
                                                        totalPreview.textContent = "Rp" + (basePrice + transportPrice + campPrice).toLocaleString(
                                                            'id-ID');
                                                        totalPreview.classList.remove("text-warning");
                                                        totalPreview.classList.add("text-success");
                                                        if (noteTotal) noteTotal.innerHTML = "";
                                                    } else if (currentPayment === "cicilan") {
                                                        // ✅ Cicilan (DP setengah harga program + biaya tambahan full)
                                                        let dpProgram = basePrice / 2;
                                                        let dp = dpProgram + transportPrice + campPrice;
                                                        let sisa = (basePrice - dpProgram);

                                                        hargaProgram.classList.add("text-decoration-line-through");
                                                        hargaProgram.textContent = "Rp" + basePrice.toLocaleString('id-ID');

                                                        totalModal.textContent = "Rp" + dp.toLocaleString('id-ID');
                                                        totalPreview.textContent = "dp: Rp" + dp.toLocaleString('id-ID');
                                                        totalPreview.classList.remove("text-success");
                                                        totalPreview.classList.add("text-warning");

                                                        if (noteTotal) {
                                                            noteTotal.innerHTML = `
                                                                <div class="fw-bold text-success">
                                                                    Bayar sekarang: Rp${dp.toLocaleString('id-ID')}
                                                                </div>
                                                                <div class="text-muted">
                                                                    Sisa pembayaran: Rp${sisa.toLocaleString('id-ID')}
                                                                </div>
                                                            `;
                                                        }
                                                    } else if (currentPayment === "dp") {
                                                        // ✅ Skema DP fix Rp500.000 + transport & camp tetap dibayar penuh
                                                        let dpProgram = 500000; // FIXED
                                                        let dp = dpProgram + transportPrice + campPrice;
                                                        let sisa = (basePrice - dpProgram);

                                                        hargaProgram.classList.add("text-decoration-line-through");
                                                        hargaProgram.textContent = "Rp" + basePrice.toLocaleString('id-ID');

                                                        totalModal.textContent = "Rp" + dp.toLocaleString('id-ID');
                                                        totalPreview.textContent = "dp: Rp" + dp.toLocaleString('id-ID');
                                                        totalPreview.classList.remove("text-success");
                                                        totalPreview.classList.add("text-warning");

                                                        if (noteTotal) {
                                                            noteTotal.innerHTML = `
                                                                <div class="fw-bold text-success">
                                                                    Bayar sekarang: Rp${dp.toLocaleString('id-ID')}
                                                                </div>
                                                                <div class="text-muted">
                                                                    Sisa pembayaran: Rp${sisa.toLocaleString('id-ID')}
                                                                </div>
                                                            `;
                                                        }
                                                    }
                                                }


                                                if (selectTransport) selectTransport.addEventListener("change", updateTotal);
                                                if (selectCamp) selectCamp.addEventListener("change", updateTotal);

                                                paymentRadios.forEach(radio => {
                                                    radio.addEventListener("change", function() {
                                                        currentPayment = this.value;
                                                        updateTotalModal();
                                                    });
                                                });

                                                btnLihatTotal.addEventListener("click", function() {
                                                    new bootstrap.Modal(document.getElementById('modalTotal')).show();
                                                });

                                                updateTotal(); // initial load
                                            });
                                        </script>
                                        <br>

                                        <script>
                                            $(document).ready(function() {
                                                toggleBankDropdown();

                                                $('input[name="payment_type"]').change(function() {
                                                    toggleBankDropdown();
                                                });

                                                function toggleBankDropdown() {
                                                    if ($('input[name="payment_type"]:checked').val() === 'transfer') {
                                                        $('#bankDropdown').slideDown();
                                                        $('select[name="bank_id"]').attr('required', true);
                                                    } else {
                                                        $('#bankDropdown').slideUp();
                                                        $('select[name="bank_id"]').removeAttr('required');
                                                    }
                                                }
                                            });
                                        </script>


                                        <div class="mb-3">
                                            <label class="form-label">
                                                <i class="bi bi-calendar-check-fill"></i> Periode
                                            </label>

                                            <?php
                                                $today = \Carbon\Carbon::now('Asia/Jakarta')->toDateString();
                                            ?>

                                            <?php if($program->program_bahasa === 'nhc'): ?>
                                                <select name="period_nhc_id" class="form-select" required>
                                                    <option value="">Pilih Periode</option>
                                                    <?php $__empty_1 = true; $__currentLoopData = $activePeriodsNHC; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $period): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <?php
                                                            $isToday =
                                                                $today >= $period->start_date->toDateString() &&
                                                                $today <= $period->end_date->toDateString();
                                                        ?>
                                                        <option value="<?php echo e($period->id); ?>"
                                                            <?php echo e(old('period_nhc_id') == $period->id ? 'selected' : ($isToday ? 'selected' : '')); ?>>
                                                            <?php echo e($period->start_date->translatedFormat('d M Y')); ?>

                                                            -
                                                            <?php echo e($period->end_date->translatedFormat('d M Y')); ?>

                                                            <?php echo e($isToday ? '(Aktif Hari Ini)' : ''); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <?php endif; ?>
                                                </select>

                                                <?php if($activePeriodsNHC->isEmpty()): ?>
                                                    <div class="form-text text-danger">
                                                        Tidak ada periode pendaftaran NHC yang aktif saat ini.
                                                    </div>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <select name="period_id" class="form-select" required>
                                                    <option value="">Pilih Periode</option>
                                                    <?php $__empty_1 = true; $__currentLoopData = $activePeriods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $period): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <?php
                                                            $periodDate = \Carbon\Carbon::parse(
                                                                $period->date,
                                                            )->toDateString();
                                                            $isToday = $periodDate === $today;
                                                        ?>
                                                        <option value="<?php echo e($period->id); ?>"
                                                            <?php echo e(old('period_id') == $period->id ? 'selected' : ($isToday ? 'selected' : '')); ?>>
                                                            <?php echo e(\Carbon\Carbon::parse($period->date)->translatedFormat('d M Y')); ?>

                                                            <?php echo e($isToday ? '(Aktif Hari Ini)' : ''); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <?php endif; ?>
                                                </select>

                                                <?php if($activePeriods->isEmpty()): ?>
                                                    <div class="form-text text-danger">
                                                        Tidak ada periode pendaftaran yang aktif saat ini.
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>

                                        <button type="submit" class="btn btn-primary w-100"
                                            <?php if(
                                                ($program->program_bahasa === 'nhc' && $activePeriodsNHC->isEmpty()) ||
                                                    ($program->program_bahasa !== 'nhc' && $periods->isEmpty()) ||
                                                    !isset($banks) ||
                                                    $banks->isEmpty()): ?> disabled <?php endif; ?>>

                                            <i class="bi bi-send-fill"></i>

                                            <?php if(
                                                ($program->program_bahasa === 'nhc' && $activePeriodsNHC->isNotEmpty()) ||
                                                    ($program->program_bahasa !== 'nhc' && $periods->isNotEmpty())): ?>
                                                Daftar Sekarang
                                            <?php else: ?>
                                                Pendaftaran Ditutup
                                            <?php endif; ?>
                                        </button>

                                        <a href="<?php echo e(url('/')); ?>" class="btn btn-outline-secondary w-100 mt-2"><i
                                                class="bi bi-arrow-left"></i> Kembali ke Beranda</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery dan jQuery UI (untuk autocomplete) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    <!-- Script Autocomplete -->
    <script>
        $(function() {
            $.getJSON('/indonesia-indonesian.json', function(data) {
                let kotaList = [];

                // Gabungkan semua kota/kab dari semua provinsi jadi satu array
                for (let provinsi in data) {
                    kotaList = kotaList.concat(data[provinsi]);
                }

                // Inisialisasi autocomplete
                $('[name="asal_kota"]').autocomplete({
                    source: kotaList,
                    minLength: 2
                });
            });
        });
    </script>



    


</body>

</html>
<?php /**PATH /home/u389110718/domains/mykampunginggris.com/kampung_inggris_plus/resources/views/programs/offline/show.blade.php ENDPATH**/ ?>