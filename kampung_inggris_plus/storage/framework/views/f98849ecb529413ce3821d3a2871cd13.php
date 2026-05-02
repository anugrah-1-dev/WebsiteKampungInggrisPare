<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pembayaran Pendaftaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        .payment-details {
            border: 2px dashed #0d6efd;
            padding: 1.5rem;
            border-radius: .5rem;
            background-color: #f8f9fa;
        }

        .list-group-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Selesaikan Pembayaran Anda</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="payment-details text-center mb-4">
                            <h5 class="mb-3">Detail Pendaftaran</h5>
                            <hr>
                            <p class="mb-1"><strong>Program:</strong></p>
                            <p class="lead">
                                <?php echo e($pendaftaran->program->nama); ?>

                                (Rp <?php echo e(number_format($pendaftaran->program->harga, 0, ',', '.')); ?>)
                            </p>

                            
                            <?php if($pendaftaran->transport): ?>
                                <p class="mb-1"><strong>Transport:</strong></p>
                                <p class="lead">
                                    <?php echo e($pendaftaran->transport->nama); ?>

                                    (Rp <?php echo e(number_format($pendaftaran->transport->price, 0, ',', '.')); ?>)
                                </p>
                            <?php endif; ?>

                            
                            <?php if($pendaftaran->camp): ?>
                                <p class="mb-1"><strong>Camp:</strong></p>
                                <p class="lead">
                                    <?php echo e($pendaftaran->camp->nama); ?>

                                    (Rp <?php echo e(number_format($pendaftaran->camp->harga, 0, ',', '.')); ?>)
                                </p>
                            <?php endif; ?>

                            <hr>

                            <p class="mb-1"><strong><?php echo e($dueLabel); ?>:</strong></p>

                            <?php if($amountToPay > 0): ?>
                                <h2 class="fw-bolder"> Rp
                                    <?php echo e(number_format($amountToPay + optional($pendaftaran->transport)->price + optional($pendaftaran->camp)->harga, 0, ',', '.')); ?>

                                </h2>

                            <?php else: ?>
                                <h2 class="fw-bolder text-success">✅ Sudah Lunas</h2>
                            <?php endif; ?>

                        </div>

                        <div class="instructions mb-4">
                            <h5 class="text-center mb-3">Instruksi Pembayaran</h5>
                            <p>Silakan transfer ke rekening berikut:</p>
                            <ul class="list-group">
                                <?php if($pendaftaran->bank): ?>
                                    <li class="list-group-item">
                                        <div>
                                            <i class="bi bi-bank"></i>
                                            <strong><?php echo e($pendaftaran->bank->name); ?>:</strong>
                                            <span id="bank-number"><?php echo e($pendaftaran->bank->number); ?></span> (a.n.
                                            <?php echo e($pendaftaran->bank->owner); ?>)
                                        </div>
                                        <button class="btn btn-sm btn-outline-secondary"
                                            onclick="copyToClipboard('<?php echo e($pendaftaran->bank->number); ?>', this)">
                                            <i class="bi bi-clipboard"></i>
                                            <span class="copy-text">Salin</span>
                                        </button>
                                    </li>
                                <?php else: ?>
                                    <li class="list-group-item text-center text-muted">Informasi bank belum dipilih.
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <hr>
                        <div class="upload-section mt-4">
                            <h5 class="text-center mb-3">Unggah Bukti Pembayaran</h5>
                            <p class="text-center text-muted small">Setelah transfer, unggah bukti Anda di sini (JPG,
                                PNG, PDF. Maks 2MB).</p>

                            
                            <?php
                                $registrationType = '';
                                if ($pendaftaran instanceof \App\Models\PendaftaranProgramOnline) {
                                    $registrationType = 'online';
                                } elseif ($pendaftaran instanceof \App\Models\PendaftaranProgramOffline) {
                                    $registrationType = 'offline';
                                } elseif ($pendaftaran instanceof \App\Models\PendaftaranProgramCamp) {
                                    $registrationType = 'camp';
                                }
                            ?>

                            <form action="<?php echo e(route('payment.upload')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($pendaftaran->id); ?>">
                                
                                <input type="hidden" name="type" value="<?php echo e($registrationType); ?>">

                                <div class="input-group">
                                    <input type="file" class="form-control" name="bukti_pembayaran"
                                        id="bukti_pembayaran" required>
                                    <button class="btn btn-primary" type="submit">
                                        <i class="bi bi-upload"></i> Kirim Bukti
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="mt-4 text-center">
                            <?php
                                $waNumber = $contactServices->isNotEmpty()
                                    ? $contactServices->first()->nomor
                                    : '6281234567890';
                            ?>
                            
                            <a href="https://wa.me/+62<?php echo e($waNumber); ?>?text=<?php echo e(urlencode('Halo, saya ingin konfirmasi pembayaran untuk ID Transaksi: ' . $pendaftaran->trx_id . ' dengan total Rp ' . number_format($amountToPay, 0, ',', '.'))); ?>"
                                class="btn btn-success mb-2" target="_blank">
                                <i class="bi bi-whatsapp"></i> Konfirmasi via WhatsApp
                            </a>

                            <a href="<?php echo e(url('/')); ?>" class="btn btn-outline-secondary mb-2"><i
                                    class="bi bi-house-door-fill"></i> Kembali ke Beranda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script untuk copy di halaman utama -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function copyToClipboard(text, buttonElement) {
            const textArea = document.createElement('textarea');
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.select();
            try {
                document.execCommand('copy');
                const copyTextSpan = buttonElement.querySelector('.copy-text');
                const originalText = copyTextSpan ? copyTextSpan.innerHTML : 'Salin';
                const icon = buttonElement.querySelector('i');

                if (copyTextSpan) {
                    copyTextSpan.innerHTML = 'Tersalin!';
                }
                icon.classList.remove('bi-clipboard');
                icon.classList.add('bi-check-lg');
                buttonElement.classList.remove('btn-outline-secondary');
                buttonElement.classList.add('btn-success');

                setTimeout(() => {
                    if (copyTextSpan) {
                        copyTextSpan.innerHTML = originalText;
                    }
                    icon.classList.remove('bi-check-lg');
                    icon.classList.add('bi-clipboard');
                    buttonElement.classList.remove('btn-success');
                    buttonElement.classList.add('btn-outline-secondary');
                }, 2000);

            } catch (err) {
                console.error('Gagal menyalin teks: ', err);
            }
            document.body.removeChild(textArea);
        }
    </script>

    <!-- SweetAlert untuk pesan sukses/error -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    <?php if(session('success_message') && session('trx_id')): ?>
        <script>
            // Fungsi ini khusus untuk tombol salin di dalam SweetAlert
            function copySwalId(text, buttonElement) {
                const textArea = document.createElement('textarea');
                textArea.value = text;
                document.body.appendChild(textArea);
                textArea.select();
                try {
                    document.execCommand('copy');
                    const copyTextSpan = buttonElement.querySelector('span');
                    const icon = buttonElement.querySelector('i');

                    if (copyTextSpan) copyTextSpan.textContent = 'Tersalin!';
                    icon.classList.remove('bi-clipboard');
                    icon.classList.add('bi-check-lg');
                    buttonElement.disabled = true; // Nonaktifkan tombol setelah disalin
                } catch (err) {
                    console.error('Gagal menyalin teks: ', err);
                }
                document.body.removeChild(textArea);
            }

            const trxId = "<?php echo e(session('trx_id')); ?>";
            const successMessage = "<?php echo e(session('success_message')); ?>";

            // Membuat konten HTML untuk SweetAlert
            const alertHtml = `
                    <div class="text-start">
                        <p>${successMessage}</p>
                        <div class="mt-3">
                            <strong>ID Transaksi Anda:</strong>
                            <div class="input-group mt-1">
                                <input type="text" class="form-control bg-light" value="${trxId}" readonly>
                                <button class="btn btn-outline-secondary" onclick="copySwalId('${trxId}', this)">
                                    <i class="bi bi-clipboard"></i>
                                    <span class="copy-text"> Salin</span>
                                </button>
                            </div>
                            <small class="form-text text-muted">Silakan simpan ID ini untuk referensi Anda.</small>
                        </div>
                    </div>
                `;

            // Menampilkan SweetAlert
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                html: alertHtml,
                showConfirmButton: true,
                confirmButtonText: 'Tutup'
            });
        </script>
    <?php endif; ?>

    
    <?php if(session('error')): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                html: `<?php echo nl2br(e(session('error'))); ?>`,
                showConfirmButton: true,
                confirmButtonText: 'Tutup'
            });
        </script>
    <?php endif; ?>

</body>

</html>
<?php /**PATH /home/u389110718/domains/biepluskampunginggris.com/kampung_inggris_plus/resources/views/pembayaran/index.blade.php ENDPATH**/ ?>