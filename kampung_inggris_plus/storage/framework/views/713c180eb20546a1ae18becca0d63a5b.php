<?php $__env->startSection('title', 'Galeri'); ?>

<?php $__env->startSection('content_header'); ?>
<div class="d-flex justify-content-between align-items-center">
    <h1>Gallery</h1>
    <a href="<?php echo e(route('admin.galleries.create')); ?>" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Galerry
    </a>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Daftar Galeri</h3>
                </div>

                <div class="card-body">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="icon fas fa-check mr-2"></i> <?php echo e(session('success')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <div class="table-responsive table-container">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Judul</th>
                                    <th>Gambar</th>
                                    <th>Tanggal Event</th>
                                    <th>Status</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($index + $galleries->firstItem()); ?></td>
                                        <td><?php echo e($gallery->title); ?></td>
                                        <td class="text-center"><?php echo e($gallery->images_count); ?> foto</td>
                                        <td class="text-center"><?php echo e($gallery->event_date ?? '-'); ?></td>
                                        <td class="text-center">
                                            <?php if($gallery->status): ?>
                                                <span class="badge badge-success">Aktif</span>
                                            <?php else: ?>
                                                <span class="badge badge-secondary">Nonaktif</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <a href="<?php echo e(route('admin.galleries.show', $gallery->id)); ?>"
                                                    class="btn btn-primary" title="Lihat">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="<?php echo e(route('admin.galleries.edit', $gallery->id)); ?>"
                                                    class="btn btn-info" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="<?php echo e(route('admin.galleries.destroy', $gallery->id)); ?>"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus galeri ini?')"
                                                    style="display: inline-block;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger" title="Hapus">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6" class="text-center py-4">
                                            <i class="fas fa-images mr-2"></i> Belum ada data galeri.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer clearfix">
                    <div class="float-right">
                        <?php echo e($galleries->links('pagination::bootstrap-4')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<style>
    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.03);
    }

    .table-container {
        max-height: 400px;
        overflow-y: auto;
        overflow-x: auto;
    }

    .table-container thead {
        position: sticky;
        top: 0;
        z-index: 1;
        background-color: #f8f9fa;
    }

    .btn-group .btn {
        width: 35px;
        padding: 0.375rem 0.5rem;
        text-align: center;
    }

    .btn-group form {
        margin: 0;
    }
</style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
<script>
    $(document).ready(function () {
        $('.btn-group .btn').hover(
            function () {
                $(this).addClass('shadow-sm');
            },
            function () {
                $(this).removeClass('shadow-sm');
            }
        );

        setTimeout(function () {
            $('.alert').alert('close');
        }, 5000);
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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389110718/domains/biepluskampunginggris.com/kampung_inggris_plus/resources/views/admin/galleries/index.blade.php ENDPATH**/ ?>