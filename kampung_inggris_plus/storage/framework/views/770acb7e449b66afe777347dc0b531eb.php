<?php $__env->startSection('title', 'Detail Galeri'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Detail Galeri: <?php echo e($gallery->title); ?></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <h4><?php echo e($gallery->title); ?></h4>
            <p><?php echo e($gallery->description); ?></p>
            <p><strong>Status:</strong>
                <span class="badge <?php echo e($gallery->status ? 'badge-success' : 'badge-secondary'); ?>">
                    <?php echo e($gallery->status ? 'Aktif' : 'Nonaktif'); ?>

                </span>
            </p>
        </div>
    </div>

    <div class="row">
        <?php $__currentLoopData = $gallery->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="<?php echo e(asset('storage/' . $image->image_path)); ?>" class="card-img-top" alt="Foto Galeri">
                    <div class="card-body">
                        <p class="text-muted small"><?php echo e($image->caption ?? '-'); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <a href="<?php echo e(route('admin.galleries.index')); ?>" class="btn btn-secondary">← Kembali</a>
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389110718/domains/biepluskampunginggris.com/kampung_inggris_plus/resources/views/admin/galleries/show.blade.php ENDPATH**/ ?>