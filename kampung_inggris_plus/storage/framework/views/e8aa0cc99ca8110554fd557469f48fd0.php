<?php $__env->startSection('title', 'Program Online'); ?>

<?php $__env->startSection('content_header'); ?>
    <div class="d-flex justify-content-between align-items-center">
        <h1>Program Online</h1>
        <a href="<?php echo e(route('admin.online.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Program
        </a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Daftar Program Online</h3>
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

                        <div class="mb-3">
                            <input type="text" id="searchInput" class="form-control" placeholder="Cari program...">
                        </div>


                        <script>
                            document.getElementById('searchInput').addEventListener('keyup', function() {
                                let filter = this.value.toLowerCase();
                                let rows = document.querySelectorAll("#program-online-table tbody tr");

                                rows.forEach(row => {
                                    let text = row.innerText.toLowerCase();
                                    row.style.display = text.includes(filter) ? "" : "none";
                                });
                            });
                        </script>


                        <div class="table-responsive table-container">
                            <table id="program-online-table" class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="15%">Thumbnail</th>
                                        <th>Nama Program</th>
                                        <th>Program Bahasa</th>
                                        <th width="15%">Kategori</th>
                                        <th width="12%">Harga</th>
                                        <th width="10%">Status</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo e($loop->iteration + ($programs->currentPage() - 1) * $programs->perPage()); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php if($program->thumbnail): ?>
                                                    <img src="<?php echo e(asset('storage/' . $program->thumbnail)); ?>"
                                                        alt="<?php echo e($program->nama); ?>" class="img-thumbnail"
                                                        style="max-height: 60px;">
                                                <?php else: ?>
                                                    <span class="text-muted"><i class="fas fa-image fa-2x"></i></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($program->nama); ?></td>
                                            <td><?php echo e(ucfirst($program->program_bahasa)); ?></td>
                                            <td><?php echo e($program->kategori ?? '-'); ?></td>
                                            <td class="text-right">Rp <?php echo e(number_format($program->harga, 0, ',', '.')); ?></td>
                                            <td class="text-center">
                                                <?php if($program->is_active): ?>
                                                    <span class="badge badge-success">Aktif</span>
                                                <?php else: ?>
                                                    <span class="badge badge-secondary">Nonaktif</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="<?php echo e(route('admin.online.edit', $program->id)); ?>"
                                                        class="btn btn-info btn-action" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="<?php echo e(route('admin.online.destroy', $program->id)); ?>"
                                                        method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus program ini?');">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn btn-danger btn-action"
                                                            title="Hapus">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>

                                            </td>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="7" class="text-center py-4">
                                                <i class="fas fa-database mr-2"></i> Belum ada data program online.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer clearfix">
                        <div class="float-right">
                            <?php echo e($programs->links('pagination::bootstrap-4')); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style>
        .img-thumbnail {
            padding: 0.25rem;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            max-width: 100%;
            height: auto;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.03);
        }

        .table-container {
            max-height: 400px;
            overflow-y: auto;
            overflow-x: auto;
        }

        .table-container table {
            width: 100%;
            min-width: 600px;
        }

        .table-container thead {
            position: sticky;
            top: 0;
            z-index: 1;
            background-color: #f8f9fa;
        }

        .btn-action {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            font-size: 15px;
        }

        .btn-action:hover {
            box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
        }
    </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function() {
            // Tambahkan efek hover pada tombol aksi
            $('.btn-group .btn').hover(
                function() {
                    $(this).addClass('shadow-sm');
                },
                function() {
                    $(this).removeClass('shadow-sm');
                }
            );

            // Auto-hide alert setelah 5 detik
            setTimeout(function() {
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389110718/domains/biepluskampunginggris.com/kampung_inggris_plus/resources/views/admin/programs/online/index.blade.php ENDPATH**/ ?>