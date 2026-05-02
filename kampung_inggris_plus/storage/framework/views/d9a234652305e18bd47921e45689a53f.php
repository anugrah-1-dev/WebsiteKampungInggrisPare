<?php $__env->startSection('title', 'Manajemen Sosial Media'); ?>

<?php $__env->startSection('content_header'); ?>
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Daftar Sosial Media</h1>
        <a href="<?php echo e(route('admin.sosmed.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Sosmed
        </a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <?php if (isset($component)) { $__componentOriginale2b5538aaf81eaeffb0a99a88907fd7b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale2b5538aaf81eaeffb0a99a88907fd7b = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\Card::resolve(['theme' => 'lightblue','themeMode' => 'outline','title' => 'List Sosial Media'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" id="searchInput" class="form-control"
                                placeholder="Cari berdasarkan nama sosial media...">
                        </div>
                    </div>
                </div>

                <div class="table-responsive scrollable-table-wrapper">
                    <table class="table table-hover table-bordered table-striped" id="sosmedTable">
                        <thead class="bg-lightblue text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama</th>
                                <th>URL</th>
                                <th>Gambar/Ikon</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $sosmeds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $sosmed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="text-center">
                                    <td><?php echo e($index + 1); ?></td>
                                    <td class="text-left">
                                        <strong><?php echo e($sosmed->nama); ?></strong>
                                    </td>
                                    <td class="text-left">
                                        <a href="<?php echo e($sosmed->url); ?>" target="_blank"><?php echo e($sosmed->url); ?></a>
                                    </td>
                                    <td>
                                        <?php if($sosmed->image_path): ?>
                                            <img src="<?php echo e(asset('storage/' . $sosmed->image_path)); ?>" alt="Icon"
                                                height="32">
                                        <?php else: ?>
                                            <i class="fas fa-share-alt text-lightblue fa-lg"></i>
                                        <?php endif; ?>
                                    </td>
                                   <td>
    <div class="d-flex justify-content-center gap-1">
        <a href="<?php echo e(route('admin.sosmed.edit', $sosmed->id)); ?>"
            class="btn btn-warning btn-action mr-1" title="Edit">
            <i class="fas fa-edit"></i>
        </a>
        <form action="<?php echo e(route('admin.sosmed.destroy', $sosmed->id)); ?>" method="POST"
            onsubmit="confirmDelete(event)">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger btn-action" title="Hapus">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>
    </div>
</td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data sosial media.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <?php if($sosmeds instanceof \Illuminate\Pagination\LengthAwarePaginator && $sosmeds->hasPages()): ?>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="dataTables_info">
                                Menampilkan <?php echo e($sosmeds->firstItem()); ?> sampai <?php echo e($sosmeds->lastItem()); ?> dari
                                <?php echo e($sosmeds->total()); ?> entri
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="float-right">
                                <?php echo e($sosmeds->links('pagination::bootstrap-4')); ?>

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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style>
        .scrollable-table-wrapper {
            max-height: 350px;
            overflow-y: auto;
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

<?php $__env->startSection('js'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(event) {
            event.preventDefault();
            const form = event.target.closest('form');
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }

        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                const searchValue = $(this).val().toLowerCase();
                $('#sosmedTable tbody tr').each(function() {
                    const rowText = $(this).text().toLowerCase();
                    $(this).toggle(rowText.includes(searchValue));
                });
            });
        });
    </script>

    <?php if(session('alert')): ?>
        <script>
            Swal.fire(<?php echo json_encode(session('alert'), 15, 512) ?>);
        </script>
    <?php endif; ?>
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389110718/domains/biepluskampunginggris.com/kampung_inggris_plus/resources/views/admin/sosmed/index.blade.php ENDPATH**/ ?>