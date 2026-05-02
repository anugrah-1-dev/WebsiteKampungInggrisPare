<?php $__env->startSection('title', 'Edit Sosial Media'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="m-0">Edit Sosial Media</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginale2b5538aaf81eaeffb0a99a88907fd7b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale2b5538aaf81eaeffb0a99a88907fd7b = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\Card::resolve(['title' => 'Form Edit Sosial Media','theme' => 'lightblue','themeMode' => 'outline'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <form action="<?php echo e(route('admin.sosmed.update', $sosmed->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="row">
                <div class="col-md-6">
                    <?php if (isset($component)) { $__componentOriginale5d826ae10df3aa87f8449f474c11664 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale5d826ae10df3aa87f8449f474c11664 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\Input::resolve(['name' => 'nama','label' => 'Nama Sosial Media'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => ''.e($sosmed->nama).'','required' => true]); ?>
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
                </div>
                <div class="col-md-6">
                    <?php if (isset($component)) { $__componentOriginale5d826ae10df3aa87f8449f474c11664 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale5d826ae10df3aa87f8449f474c11664 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\Input::resolve(['name' => 'url','label' => 'URL'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => ''.e($sosmed->url).'','required' => true]); ?>
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
                </div>

                <div class="col-md-12 mt-2">
                    <?php if (isset($component)) { $__componentOriginalc49abe9ea9cb5496814d5780e6ddffe2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc49abe9ea9cb5496814d5780e6ddffe2 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\InputFile::resolve(['name' => 'image_path','label' => 'Ganti Icon (opsional)','id' => 'imageInputEdit'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-input-file'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Form\InputFile::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc49abe9ea9cb5496814d5780e6ddffe2)): ?>
<?php $attributes = $__attributesOriginalc49abe9ea9cb5496814d5780e6ddffe2; ?>
<?php unset($__attributesOriginalc49abe9ea9cb5496814d5780e6ddffe2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc49abe9ea9cb5496814d5780e6ddffe2)): ?>
<?php $component = $__componentOriginalc49abe9ea9cb5496814d5780e6ddffe2; ?>
<?php unset($__componentOriginalc49abe9ea9cb5496814d5780e6ddffe2); ?>
<?php endif; ?>
                    <small id="fileNameEdit" class="form-text text-muted mt-1"></small>

                    
                    <?php if($sosmed->image_path): ?>
                        <small id="currentIconLabel" class="form-text text-muted">Icon saat ini:</small>
                        <img id="imagePreviewEditExisting" src="<?php echo e(asset('storage/' . $sosmed->image_path)); ?>"
                            alt="Icon" class="img-thumbnail mt-2" style="max-height: 150px;">
                    <?php endif; ?>

                    
                    <img id="imagePreviewEdit" src="#" alt="Preview Baru" class="mt-2 d-none img-thumbnail"
                        style="max-height: 150px;">
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a href="<?php echo e(route('admin.sosmed.index')); ?>" class="btn btn-secondary mr-2">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </form>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        document.getElementById('imageInputEdit').addEventListener('change', function(event) {
            const input = event.target;
            const fileNameText = document.getElementById('fileNameEdit');
            const previewImg = document.getElementById('imagePreviewEdit');
            const existingImg = document.getElementById('imagePreviewEditExisting');
            const currentLabel = document.getElementById('currentIconLabel');

            if (input.files && input.files[0]) {
                fileNameText.textContent = "File dipilih: " + input.files[0].name;

                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewImg.classList.remove('d-none');

                    if (existingImg) {
                        existingImg.classList.add('d-none');
                    }

                    if (currentLabel) {
                        currentLabel.classList.add('d-none');
                    }
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                fileNameText.textContent = '';
                previewImg.src = '#';
                previewImg.classList.add('d-none');

                if (existingImg) {
                    existingImg.classList.remove('d-none');
                }

                if (currentLabel) {
                    currentLabel.classList.remove('d-none');
                }
            }
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389110718/domains/biepluskampunginggris.com/kampung_inggris_plus/resources/views/admin/sosmed/edit.blade.php ENDPATH**/ ?>