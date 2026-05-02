<?php $__env->startSection('title', 'Edit Galeri'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Edit Galeri: <?php echo e($gallery->title); ?></h1>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <strong>Ups!</strong> Ada kesalahan dalam input:
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(route('admin.galleries.update', $gallery->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="form-group">
                    <label for="title">Judul Galeri</label>
                    <input type="text" name="title" class="form-control" value="<?php echo e(old('title', $gallery->title)); ?>"
                        required>
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" class="form-control"><?php echo e(old('description', $gallery->description)); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option value="1" <?php echo e($gallery->status ? 'selected' : ''); ?>>Aktif</option>
                        <option value="0" <?php echo e(!$gallery->status ? 'selected' : ''); ?>>Nonaktif</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="images">Upload Gambar Baru (Opsional)</label>
                    <input type="file" name="images[]" class="form-control" multiple accept="image/*">
                    <small class="text-muted">Kosongkan jika tidak ingin menambah gambar baru.</small>
                </div>

                <div class="card-footer px-0">
                    <button type="submit" class="btn btn-success">Update Galeri</button>
                    <a href="<?php echo e(route('admin.galleries.index')); ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h5>Gambar Saat Ini</h5>
            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $gallery->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-3 mb-3">
                        <div class="card shadow-sm">
                            <img src="<?php echo e(asset('storage/' . $image->image_path)); ?>" class="card-img-top rounded"
                                alt="Gambar Galeri">
                            <div class="card-body p-2 text-center">
                                <button class="btn btn-sm btn-danger btn-block btn-delete-image"
                                    data-id="<?php echo e($image->id); ?>"
                                    data-url="<?php echo e(route('admin.galleries.images.destroy', $image->id)); ?>">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12">
                        <p class="text-muted">Belum ada gambar yang ditambahkan.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <form id="delete-image-form" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-delete-image');
            const deleteForm = document.getElementById('delete-image-form');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const url = this.getAttribute('data-url');

                    Swal.fire({
                        title: 'Yakin hapus gambar ini?',
                        text: "Gambar akan dihapus permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            deleteForm.setAttribute('action', url);
                            deleteForm.submit();
                        }
                    });
                });
            });
        });
    </script>
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389110718/domains/biepluskampunginggris.com/kampung_inggris_plus/resources/views/admin/galleries/edit.blade.php ENDPATH**/ ?>