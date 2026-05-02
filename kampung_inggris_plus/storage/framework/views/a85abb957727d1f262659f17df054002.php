<?php $__env->startSection('title', 'Manajemen Permission'); ?>

<?php $__env->startSection('content_header'); ?>
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Daftar Permission</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPermissionModal">
            <i class="fas fa-plus"></i> Tambah Permission
        </button>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <?php if (isset($component)) { $__componentOriginale2b5538aaf81eaeffb0a99a88907fd7b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale2b5538aaf81eaeffb0a99a88907fd7b = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\Card::resolve(['theme' => 'lightblue','themeMode' => 'outline','title' => 'List Permission'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

                <!-- Search and Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" id="searchPermissionInput" class="form-control"
                                placeholder="Cari permission...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" id="guardFilter">
                            <option value="">Semua Guard</option>
                            <?php $__currentLoopData = $permissions->pluck('guard_name')->unique(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guard): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($guard); ?>"><?php echo e($guard); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <!-- Permission Table -->
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped" id="permissionsTable">
                        <thead class="bg-lightblue">
                            <tr>
                                <th width="5%">#</th>
                                <th>Nama Permission</th>
                                <th>Guard</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($permission->name); ?></td>
                                    <td><?php echo e($permission->guard_name); ?></td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <!-- Tombol Edit -->
                                            <a href="<?php echo e(route('admin.permissions.edit', $permission->id)); ?>"
                                                class="btn btn-warning btn-action" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Tombol Hapus -->
                                            <form method="POST"
                                                action="<?php echo e(route('admin.permissions.destroy', $permission->id)); ?>"
                                                class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-action btn-delete"
                                                    title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </td>


                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data permission.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <?php if($permissions instanceof \Illuminate\Pagination\LengthAwarePaginator && $permissions->hasPages()): ?>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="dataTables_info">
                                Menampilkan <?php echo e($permissions->firstItem()); ?> sampai <?php echo e($permissions->lastItem()); ?> dari
                                <?php echo e($permissions->total()); ?> entri
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="float-right">
                                <?php echo e($permissions->links('pagination::bootstrap-5')); ?>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale2b5538aaf81eaeffb0a99a88907fd7b)): ?>
<?php $attributes = $__attributesOriginale2b5538aaf81eaeffb0a99a88907fd7b; ?>
<?php unset($__attributesOriginale2b5538aaf81eaeffb0a99a88907fd7b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale2b5538aaf81eaeffb0a99a88907fd7b)): ?>
<?php $component = $__componentOriginale2b5538aaf81eaeffb0a99a88907fd7b; ?>
<?php unset($__componentOriginale2b5538aaf81eaeffb0a99a88907fd7b); ?>
<?php endif; ?>
        </div>
    </div>
    <!-- Create Permission Modal -->
    <div class="modal fade" id="createPermissionModal" tabindex="-1" aria-labelledby="createPermissionLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="<?php echo e(route('admin.permissions.store')); ?>" method="POST" class="modal-content">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="createPermissionLabel">Tambah Permission Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Permission</label>
                        <input type="text" name="name" class="form-control" placeholder="Masukkan nama permission"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Guard</label>
                        <select name="guard_name" class="form-select" required>
                            <option value="web">web</option>

                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style>
        .table thead th {
            vertical-align: middle;
        }

        .table thead th {
            vertical-align: middle;
        }

        .btn-group-sm .btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.765625rem;
        }

        .btn-action {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }
    </style>
<?php $__env->stopSection(); ?>

<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome (untuk icon seperti fas fa-plus, fa-edit, dll) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<!-- Bootstrap 5 JS (wajib untuk modal, dropdown, dll) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            alert("Script jalan"); // TESTING

            document.querySelectorAll('.btn-delete').forEach((btn) => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    alert("Klik delete kepanggil"); // TESTING

                    const form = this.closest('form');
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Permission ini akan dihapus permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>

    <script>
        // Search & filter
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchPermissionInput');
            const guardFilter = document.getElementById('guardFilter');
            const rows = document.querySelectorAll('#permissionsTable tbody tr');

            function filterTable() {
                const searchValue = searchInput.value.toLowerCase();
                const guardValue = guardFilter.value;
                rows.forEach(row => {
                    const rowText = row.textContent.toLowerCase();
                    const guardMatch = guardValue === "" || row.cells[2].textContent.includes(guardValue);
                    const searchMatch = searchValue === "" || rowText.includes(searchValue);
                    row.style.display = (guardMatch && searchMatch) ? '' : 'none';
                });
            }

            searchInput.addEventListener('keyup', filterTable);
            guardFilter.addEventListener('change', filterTable);
        });
    </script>

    <?php if(session('success')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?php echo e(session('success')); ?>',
                timer: 2000,
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389110718/domains/biepluskampunginggris.com/kampung_inggris_plus/resources/views/admin/permissions/index.blade.php ENDPATH**/ ?>