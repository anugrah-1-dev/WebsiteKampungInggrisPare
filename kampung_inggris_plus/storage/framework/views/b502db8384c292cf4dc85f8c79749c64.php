<?php $__env->startSection('title', 'Manajemen Periode'); ?>

<?php $__env->startSection('content_header'); ?>
<div class="d-flex justify-content-between align-items-center">
    <h1 class="m-0">Manajemen Periode</h1>
    <?php if (isset($component)) { $__componentOriginal84b78d66d5203b43b9d8c22236838526 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal84b78d66d5203b43b9d8c22236838526 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\Button::resolve(['label' => 'Tambah Periode','theme' => 'primary','icon' => 'fas fa-plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Form\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-toggle' => 'modal','data-target' => '#createPeriodModal']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal84b78d66d5203b43b9d8c22236838526)): ?>
<?php $attributes = $__attributesOriginal84b78d66d5203b43b9d8c22236838526; ?>
<?php unset($__attributesOriginal84b78d66d5203b43b9d8c22236838526); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal84b78d66d5203b43b9d8c22236838526)): ?>
<?php $component = $__componentOriginal84b78d66d5203b43b9d8c22236838526; ?>
<?php unset($__componentOriginal84b78d66d5203b43b9d8c22236838526); ?>
<?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if (isset($component)) { $__componentOriginale2b5538aaf81eaeffb0a99a88907fd7b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale2b5538aaf81eaeffb0a99a88907fd7b = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\Card::resolve(['theme' => 'lightblue','themeMode' => 'outline','title' => 'Daftar Periode'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="row mb-3">
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input type="text" id="searchInput" class="form-control" placeholder="Cari tanggal...">
            </div>
        </div>
    </div>

    <div class="table-responsive scrollable-table-wrapper">
        <table class="table table-hover table-bordered table-striped" id="periodTable">
            <thead class="bg-lightblue text-center">
                <tr>
                    <th width="5%">#</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Dibuat</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $periods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $period): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="text-center align-middle">
                        <td><?php echo e($index + $periods->firstItem()); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($period->date)->format('d-m-Y')); ?></td>
                        <td>
                            <span class="badge <?php echo e($period->is_active ? 'badge-success' : 'badge-secondary'); ?>">
                                <?php echo e($period->is_active ? 'Aktif' : 'Tidak Aktif'); ?>

                            </span>
                        </td>
                        <td><?php echo e($period->created_at->diffForHumans()); ?></td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-warning btn-sm btn-action btn-edit-period"
                                    data-toggle="modal" data-target="#editPeriodModal" data-id="<?php echo e($period->id); ?>"
                                    data-date="<?php echo e($period->date->format('Y-m-d')); ?>"
                                    data-is_active="<?php echo e($period->is_active); ?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="<?php echo e(route('admin.periods.destroy', $period->id)); ?>" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus periode ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger btn-sm btn-action" title="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>


                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted">Tidak ada data periode.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if($periods->hasPages()): ?>
        <div class="d-flex justify-content-between mt-3">
            <small class="text-muted">Menampilkan <?php echo e($periods->firstItem()); ?> - <?php echo e($periods->lastItem()); ?> dari
                <?php echo e($periods->total()); ?> data</small>
            <div><?php echo e($periods->links('pagination::bootstrap-4')); ?></div>
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


<?php if (isset($component)) { $__componentOriginale2dfb698641700bc6575e0f9f2d3d632 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale2dfb698641700bc6575e0f9f2d3d632 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Tool\Modal::resolve(['id' => 'createPeriodModal','title' => 'Tambah Periode Baru','theme' => 'lightblue','size' => 'md','staticBackdrop' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Tool\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <form action="<?php echo e(route('admin.periods.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php if (isset($component)) { $__componentOriginale5d826ae10df3aa87f8449f474c11664 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale5d826ae10df3aa87f8449f474c11664 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\Input::resolve(['name' => 'date','label' => 'Tanggal'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'date','required' => true,'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('date')),'class' => ''.e($errors->has('date') ? 'is-invalid' : '').'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale5d826ae10df3aa87f8449f474c11664)): ?>
<?php $attributes = $__attributesOriginale5d826ae10df3aa87f8449f474c11664; ?>
<?php unset($__attributesOriginale5d826ae10df3aa87f8449f474c11664); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale5d826ae10df3aa87f8449f474c11664)): ?>
<?php $component = $__componentOriginale5d826ae10df3aa87f8449f474c11664; ?>
<?php unset($__componentOriginale5d826ae10df3aa87f8449f474c11664); ?>
<?php endif; ?>

        <?php if(session('_modal') === 'create' && $errors->has('date')): ?>
            <div class="alert alert-danger mt-2"><?php echo e($errors->first('date')); ?></div>
        <?php endif; ?>

        <?php if (isset($component)) { $__componentOriginal587fcbaf9fe57260c92dacb875f53fad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal587fcbaf9fe57260c92dacb875f53fad = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\InputSwitch::resolve(['name' => 'is_active','label' => 'Jadikan Aktif'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-input-switch'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Form\InputSwitch::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-on-text' => 'Ya','data-off-text' => 'Tidak','checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('is_active'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal587fcbaf9fe57260c92dacb875f53fad)): ?>
<?php $attributes = $__attributesOriginal587fcbaf9fe57260c92dacb875f53fad; ?>
<?php unset($__attributesOriginal587fcbaf9fe57260c92dacb875f53fad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal587fcbaf9fe57260c92dacb875f53fad)): ?>
<?php $component = $__componentOriginal587fcbaf9fe57260c92dacb875f53fad; ?>
<?php unset($__componentOriginal587fcbaf9fe57260c92dacb875f53fad); ?>
<?php endif; ?>

        <div class="d-flex justify-content-end mt-3">
            <button type="button" class="btn btn-secondary btn-sm mr-2" data-dismiss="modal">
                <i class="fas fa-times"></i> Batal
            </button>
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fas fa-save"></i> Simpan
            </button>
        </div>
    </form>
     <?php $__env->slot('footerSlot', null, []); ?> 
        <style>
            #createPeriodModal .modal-footer {
                display: none;
            }
        </style>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale2dfb698641700bc6575e0f9f2d3d632)): ?>
<?php $attributes = $__attributesOriginale2dfb698641700bc6575e0f9f2d3d632; ?>
<?php unset($__attributesOriginale2dfb698641700bc6575e0f9f2d3d632); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale2dfb698641700bc6575e0f9f2d3d632)): ?>
<?php $component = $__componentOriginale2dfb698641700bc6575e0f9f2d3d632; ?>
<?php unset($__componentOriginale2dfb698641700bc6575e0f9f2d3d632); ?>
<?php endif; ?>


<?php if (isset($component)) { $__componentOriginale2dfb698641700bc6575e0f9f2d3d632 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale2dfb698641700bc6575e0f9f2d3d632 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Tool\Modal::resolve(['id' => 'editPeriodModal','title' => 'Edit Periode','theme' => 'lightblue','size' => 'md','staticBackdrop' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Tool\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <form id="editPeriodForm" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <input type="hidden" name="id" id="editId">

        <?php if (isset($component)) { $__componentOriginale5d826ae10df3aa87f8449f474c11664 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale5d826ae10df3aa87f8449f474c11664 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\Input::resolve(['name' => 'date','label' => 'Tanggal','id' => 'editDate'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'date','required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale5d826ae10df3aa87f8449f474c11664)): ?>
<?php $attributes = $__attributesOriginale5d826ae10df3aa87f8449f474c11664; ?>
<?php unset($__attributesOriginale5d826ae10df3aa87f8449f474c11664); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale5d826ae10df3aa87f8449f474c11664)): ?>
<?php $component = $__componentOriginale5d826ae10df3aa87f8449f474c11664; ?>
<?php unset($__componentOriginale5d826ae10df3aa87f8449f474c11664); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal587fcbaf9fe57260c92dacb875f53fad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal587fcbaf9fe57260c92dacb875f53fad = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\InputSwitch::resolve(['name' => 'is_active','label' => 'Jadikan Aktif','id' => 'editIsActiveSwitch'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-input-switch'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Form\InputSwitch::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-on-text' => 'Ya','data-off-text' => 'Tidak']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal587fcbaf9fe57260c92dacb875f53fad)): ?>
<?php $attributes = $__attributesOriginal587fcbaf9fe57260c92dacb875f53fad; ?>
<?php unset($__attributesOriginal587fcbaf9fe57260c92dacb875f53fad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal587fcbaf9fe57260c92dacb875f53fad)): ?>
<?php $component = $__componentOriginal587fcbaf9fe57260c92dacb875f53fad; ?>
<?php unset($__componentOriginal587fcbaf9fe57260c92dacb875f53fad); ?>
<?php endif; ?>

        <div class="d-flex justify-content-end mt-3">
            <button type="button" class="btn btn-secondary btn-sm mr-2" data-dismiss="modal">
                <i class="fas fa-times"></i> Batal
            </button>
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
        </div>
    </form>
     <?php $__env->slot('footerSlot', null, []); ?> 
        <style>
            #editPeriodModal .modal-footer {
                display: none;
            }
        </style>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale2dfb698641700bc6575e0f9f2d3d632)): ?>
<?php $attributes = $__attributesOriginale2dfb698641700bc6575e0f9f2d3d632; ?>
<?php unset($__attributesOriginale2dfb698641700bc6575e0f9f2d3d632); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale2dfb698641700bc6575e0f9f2d3d632)): ?>
<?php $component = $__componentOriginale2dfb698641700bc6575e0f9f2d3d632; ?>
<?php unset($__componentOriginale2dfb698641700bc6575e0f9f2d3d632); ?>
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
<?php $__env->startSection('css'); ?>
<style>
    .scrollable-table-wrapper {
        max-height: 350px;
        overflow-y: auto;

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
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    $(document).ready(function () {
        // Isi form edit dan buka modal
        $('.btn-edit-period').on('click', function () {
            const id = $(this).data('id');
            const date = $(this).data('date');
            const isActive = $(this).data('is_active') == 1;

            $('#editId').val(id);
            $('#editDate').val(date);
            $('#editIsActiveSwitch').prop('checked', isActive);

            const actionUrl = `/admin/periods/${id}`;
            $('#editPeriodForm').attr('action', actionUrl);
        });

        // Filter table berdasarkan pencarian
        $('#searchInput').on('keyup', function () {
            const value = $(this).val().toLowerCase();
            $('#periodTable tbody tr').each(function () {
                $(this).toggle($(this).text().toLowerCase().includes(value));
            });
        });

        // Reset form create saat modal ditutup
        $('#createPeriodModal').on('hidden.bs.modal', function () {
            const form = $(this).find('form')[0];
            form.reset();
            $(form).find('.is-invalid').removeClass('is-invalid');
            $(form).find('.alert-danger').remove();
        });

        // Tampilkan kembali modal create jika gagal validasi
        <?php if($errors->any() && session('_modal') === 'create'): ?>
            $('#createPeriodModal').modal('show');
        <?php endif; ?>
        });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389110718/domains/biepluskampunginggris.com/kampung_inggris_plus/resources/views/admin/periods/index.blade.php ENDPATH**/ ?>