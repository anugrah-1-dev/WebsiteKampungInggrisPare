<?php $__env->startSection('title', 'Pamflet Program'); ?>

<?php $__env->startSection('content_header'); ?>
    <div class="d-flex justify-content-between align-items-center">
        <h1>Pamflet Program</h1>
        <a href="<?php echo e(route('admin.pamflet_programs.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Program
        </a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <div class="mb-4">
                <form action="<?php echo e(route('admin.pamflet_programs.index')); ?>" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control"
                            placeholder="Cari berdasarkan judul program..." value="<?php echo e(request('search')); ?>">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class="table-responsive scrollable-table-wrapper" style="max-height: 350px; overflow: auto;">
                <table class="table table-bordered table-hover">
                    <thead class="table-custom-header">
                        <tr>
                            <th style="width: 10px;">No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Keunggulan</th>
                            <th style="width: 150px;">Gambar</th>
                            <th>Status</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e(($programs->currentPage() - 1) * $programs->perPage() + $loop->iteration); ?></td>


                                <td><?php echo e($program->judul); ?></td>
                                <td><?php echo e(Str::limit($program->deskripsi, 50, '...')); ?></td>
                                <td><?php echo e(Str::limit($program->keunggulan, 50, '...')); ?></td>
                                <td>
                                    <img src="<?php echo e(asset('uploads/programs/' . $program->gambar)); ?>"
                                        alt="<?php echo e($program->judul); ?>" class="img-thumbnail" width="100">
                                </td>
                                <td>
                                    <?php if($program->status === 'aktif'): ?>
                                        <span class="badge bg-success">Aktif</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Nonaktif</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
    <div class="btn-group btn-group-sm" role="group">
        <a href="<?php echo e(route('admin.pamflet_programs.edit', $program->id)); ?>"
            class="btn btn-warning" title="Edit">
            <i class="fas fa-edit"></i>
        </a>
        <form action="<?php echo e(route('admin.pamflet_programs.destroy', $program->id)); ?>"
            method="POST"
            onsubmit="return confirm('Anda yakin ingin menghapus program ini?')"
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
                                <td colspan="7" class="text-center">Tidak ada data program.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                    <?php if($programs instanceof \Illuminate\Pagination\LengthAwarePaginator && $programs->hasPages()): ?>
                    <?php endif; ?>

                </table>

            </div>

        </div>

    </div>
    <div class="d-flex justify-content-center mt-3">
        <ul class="pagination">
            
            <li class="page-item <?php echo e($programs->onFirstPage() ? 'disabled' : ''); ?>">
                <a class="page-link" href="<?php echo e($programs->onFirstPage() ? '#' : $programs->previousPageUrl()); ?>">«</a>
            </li>

            
            <?php $__currentLoopData = $programs->getUrlRange(1, $programs->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="page-item <?php echo e($programs->currentPage() == $page ? 'active' : ''); ?>">
                    <a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <li class="page-item <?php echo e(!$programs->hasMorePages() ? 'disabled' : ''); ?>">
                <a class="page-link" href="<?php echo e($programs->hasMorePages() ? $programs->nextPageUrl() : '#'); ?>">»</a>
            </li>
        </ul>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        .table-custom-header {
            background-color: #3c8dbc;
            color: white;
        }

        .scrollable-table-wrapper {
            max-height: 400px;
            overflow-y: auto;
        }

        /* Atur lebar minimum kolom */
        table th:nth-child(1),
        table td:nth-child(1) {
            min-width: 40px;
            /* No */
        }

        table th:nth-child(2),
        table td:nth-child(2) {
            min-width: 180px;
            /* Judul */
        }

        table th:nth-child(3),
        table td:nth-child(3),
        table th:nth-child(4),
        table td:nth-child(4) {
            min-width: 200px;
            /* Deskripsi, Keunggulan */
        }

        table th:nth-child(5),
        table td:nth-child(5) {
            min-width: 130px;
            /* Gambar */
        }

        table th:nth-child(6),
        table td:nth-child(6) {
            min-width: 100px;
            /* Status */
        }

        table th:nth-child(7),
        table td:nth-child(7) {
            min-width: 130px;
            /* Aksi */
        }

        .pagination {
            list-style: none;
            padding-left: 0;
            display: flex;
            gap: 4px;
        }

        .pagination .page-item {
            display: inline-block;
        }

        .pagination .page-link {
            display: block;
            padding: 6px 12px;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            color: #007bff;
            text-decoration: none;
            background-color: #fff;
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .pagination .page-item.disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            background-color: #f8f9fa;
        }

        .btn-group .btn,
.btn-group form button {
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
}

    </style>
<?php $__env->stopPush(); ?>

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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389110718/domains/biepluskampunginggris.com/kampung_inggris_plus/resources/views/admin/pamflet_programs/index.blade.php ENDPATH**/ ?>