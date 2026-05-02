<?php $__env->startSection('title', 'Edit Pendaftaran'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="m-0">Edit Status Pendaftaran: <?php echo e($pendaftaran->trx_id); ?></h1>
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

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-md-6">
                            <h4>Informasi Pendaftar</h4>
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 30%;">TRX ID</th>
                                    <td><?php echo e($pendaftaran->trx_id); ?></td>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td><?php echo e($pendaftaran->nama_lengkap); ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?php echo e($pendaftaran->email); ?></td>
                                </tr>
                                <tr>
                                    <th>Program</th>
                                    <td><?php echo e($pendaftaran->program->nama ?? '-'); ?></td>
                                </tr>
                                <tr>
                                    <th>Periode</th>
                                    <td>
                                        <?php if($pendaftaran->program->program_bahasa === 'nhc' && $pendaftaran->periodNHC): ?>
                                            <?php echo e($pendaftaran->periodNHC->start_date->translatedFormat('d F Y')); ?>

                                            -
                                            <?php echo e($pendaftaran->periodNHC->end_date->translatedFormat('d F Y')); ?>

                                        <?php else: ?>
                                            <?php echo e(optional($pendaftaran->period?->date)->translatedFormat('d F Y') ?? '-'); ?>

                                        <?php endif; ?>
                                    </td>



                                </tr>


                            </table>

                            <h4 class="mt-4">Ubah Status</h4>
                            <form action="<?php echo e(route('admin.pendaftaran.offline.update', $pendaftaran->id)); ?>"
                                method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>

                                <div class="form-group">
                                    <label for="status">Status Pembayaran</label>
                                    <select name="status" id="status"
                                        class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value="pending" <?php echo e($pendaftaran->status == 'pending' ? 'selected' : ''); ?>>
                                            Pending</option>
                                        <option value="approved"
                                            <?php echo e($pendaftaran->status == 'diterima' ? 'selected' : ''); ?>>
                                            Approved (Diterima)
                                        </option>
                                        <option value="rejected" <?php echo e($pendaftaran->status == 'ditolak' ? 'selected' : ''); ?>>
                                            Rejected (Ditolak)
                                        </option>
                                    </select>
                                    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="<?php echo e(route('admin.pendaftaran.offline.index')); ?>"
                                    class="btn btn-secondary">Batal</a>
                            </form>
                        </div>

                        
                        <div class="col-md-6">
                            <h4>Bukti Pembayaran</h4>
                            <?php if($pendaftaran->bukti_pembayaran): ?>
                                <a href="<?php echo e(asset('storage/' . $pendaftaran->bukti_pembayaran)); ?>" target="_blank">
                                    <img src="<?php echo e(asset('storage/' . $pendaftaran->bukti_pembayaran)); ?>"
                                        alt="Bukti Pembayaran" class="img-fluid rounded border">
                                </a>
                            <?php else: ?>
                                <div class="alert alert-warning">
                                    Pendaftar belum mengunggah bukti pembayaran.
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389110718/domains/biepluskampunginggris.com/kampung_inggris_plus/resources/views/admin/pendaftaran_offline/edit.blade.php ENDPATH**/ ?>