<?php $__env->startSection('title', 'Program Offline'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Program Offline</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Program Offline</h3>
                        <div class="card-tools">
                            <a href="<?php echo e(route('admin.offline.create')); ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Tambah Program
                            </a>
                        </div>
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo e(session('success')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <div class="mb-3">
                            <input type="text" id="searchInput" class="form-control" placeholder="Cari program...">
                        </div>


                        <script>
                            document.getElementById('searchInput').addEventListener('keyup', function() {
                                let filter = this.value.toLowerCase();
                                let rows = document.querySelectorAll("#program-offline-table tbody tr");

                                rows.forEach(row => {
                                    let text = row.innerText.toLowerCase();
                                    row.style.display = text.includes(filter) ? "" : "none";
                                });
                            });
                        </script>



                        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">

                            <table id="program-offline-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Thumbnail</th>
                                        <th>Nama Program</th>
                                        <th>Program Bahasa</th>
                                        <th>Harga</th>
                                        <th>Jadwal</th>
                                        <th>Kuota</th>
                                        <th>Status</th>
                                        <th style="width: 120px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration + ($programs->currentPage() - 1) * $programs->perPage()); ?>

                                            </td>
                                            <td>
                                                <?php if($program->thumbnail): ?>
                                                    <img src="<?php echo e(asset('storage/' . $program->thumbnail)); ?>"
                                                        alt="<?php echo e($program->nama); ?>" width="100">
                                                <?php else: ?>
                                                    <span class="text-muted">No Image</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($program->nama); ?></td>
                                            <td><?php echo e(ucfirst($program->program_bahasa)); ?></td>
                                            <td>Rp <?php echo e(number_format($program->harga, 0, ',', '.')); ?></td>
                                            <td>
                                                <?php echo e(\Carbon\Carbon::parse($program->jadwal_mulai)->format('d M Y')); ?> -
                                                <?php echo e(\Carbon\Carbon::parse($program->jadwal_selesai)->format('d M Y')); ?>



                                            </td>
                                            <td><?php echo e($program->kuota); ?></td>
                                            <td>
                                                <?php if($program->is_active): ?>
                                                    <span class="badge badge-success">Aktif</span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger">Tidak Aktif</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="<?php echo e(route('admin.offline.edit', $program->id)); ?>"
                                                        class="btn btn-info btn-action" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="<?php echo e(route('admin.offline.destroy', $program->id)); ?>"
                                                        method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus program ini?');">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn btn-danger btn-action"
                                                            title="Hapus">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="8" class="text-center">Belum ada data program offline.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <?php echo e($programs->links()); ?>

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style>
        .btn-action {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            font-size: 16px;
        }
    </style>
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389110718/domains/biepluskampunginggris.com/kampung_inggris_plus/resources/views/admin/programs/offline/index.blade.php ENDPATH**/ ?>