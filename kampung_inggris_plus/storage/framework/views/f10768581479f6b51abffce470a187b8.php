<?php $__env->startSection('title', 'Edit Program Camp'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="m-0 text-dark">Edit Program Camp</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Form Edit Program Camp</h3>
                </div>

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

                <form action="<?php echo e(route('admin.programs.camp.update', $program->id)); ?>" method="POST"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="card-body">
                        <!-- Informasi Dasar -->
                        <div class="section-header mb-4">
                            <h4><i class="fas fa-info-circle mr-2"></i>Informasi Dasar</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php if (isset($component)) { $__componentOriginale5d826ae10df3aa87f8449f474c11664 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale5d826ae10df3aa87f8449f474c11664 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\Input::resolve(['name' => 'nama','label' => 'Nama Program','fgroupClass' => 'mb-3'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => 'Masukkan nama program','value' => ''.e(old('nama', $program->nama)).'']); ?>
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
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\Input::resolve(['name' => 'slug','label' => 'Slug','fgroupClass' => 'mb-3'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => 'program-camp-slug','value' => ''.e(old('slug', $program->slug)).'']); ?>
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
                        </div>
                        

                        <!-- Harga -->
                        <div class="section-header mb-4">
                            <h4><i class="fas fa-tags mr-2"></i>Harga</h4>
                        </div>
                        <div class="row">
                            <?php $__currentLoopData = [
            'harga_perhari' => 'Per Hari',
            'harga_satu_minggu' => '1 Minggu',
            'harga_dua_minggu' => '2 Minggu',
            'harga_tiga_minggu' => '3 Minggu',
            'harga_satu_bulan' => '1 Bulan',
            'harga_dua_bulan' => '2 Bulan',
            'harga_tiga_bulan' => '3 Bulan',
            'harga_enam_bulan' => '6 Bulan',
            'harga_satu_tahun' => '1 Tahun',
        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4 col-sm-6">
                                    <?php if (isset($component)) { $__componentOriginale5d826ae10df3aa87f8449f474c11664 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale5d826ae10df3aa87f8449f474c11664 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\Input::resolve(['name' => ''.e($field).'','label' => 'Harga '.e($label).'','fgroupClass' => 'mb-3'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','min' => '0','placeholder' => '0','value' => ''.e(old($field, $program->$field)).'']); ?>
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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <!-- Fasilitas -->
                        <div class="section-header mb-4">
                            <h4><i class="fas fa-list-ul mr-2"></i>Fasilitas</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <?php if (isset($component)) { $__componentOriginala47f947a90f7125ced2d0aa2e9c7c7d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala47f947a90f7125ced2d0aa2e9c7c7d7 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\Textarea::resolve(['name' => 'fasilitas','label' => 'Fasilitas','fgroupClass' => 'mb-3'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Form\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => 'Pisahkan dengan koma (contoh: WiFi, Makan 3x, Transportasi)','rows' => '4']); ?>
                                    <?php echo e(old('fasilitas', $program->fasilitas)); ?>

                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala47f947a90f7125ced2d0aa2e9c7c7d7)): ?>
<?php $attributes = $__attributesOriginala47f947a90f7125ced2d0aa2e9c7c7d7; ?>
<?php unset($__attributesOriginala47f947a90f7125ced2d0aa2e9c7c7d7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala47f947a90f7125ced2d0aa2e9c7c7d7)): ?>
<?php $component = $__componentOriginala47f947a90f7125ced2d0aa2e9c7c7d7; ?>
<?php unset($__componentOriginala47f947a90f7125ced2d0aa2e9c7c7d7); ?>
<?php endif; ?>
                            </div>
                        </div>

                        <div class="section-header mb-4">
                            <h4><i class="fas fa-image mr-2"></i>Thumbnail</h4>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <?php if($program->thumbnails->count()): ?>
                                    <div class="form-group">
                                        <label>Thumbnail Saat Ini</label>
                                        <div class="d-flex flex-wrap gap-3">
                                            <?php $__currentLoopData = $program->thumbnails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="thumbnail-item text-center" id="thumb-<?php echo e($thumb->id); ?>">
                                                    <img src="<?php echo e(asset($thumb->image)); ?>" class="img-thumbnail"
                                                        style="width: 300px; height: 150px; object-fit: contain; background-color: #f0f0f0; display: block; margin: 0 auto;">

                                                    <div class="mt-2">
                                                        <button type="button"
                                                            class="btn btn-danger btn-sm btn-delete-thumbnail"
                                                            data-thumbnail-id="<?php echo e($thumb->id); ?>">
                                                            Hapus
                                                        </button>

                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if (isset($component)) { $__componentOriginalc49abe9ea9cb5496814d5780e6ddffe2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc49abe9ea9cb5496814d5780e6ddffe2 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\InputFile::resolve(['name' => 'thumbnail[]','label' => 'Ganti Thumbnail (opsional)','fgroupClass' => 'mb-3','igroupSize' => 'sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-input-file'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Form\InputFile::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['accept' => 'image/*','multiple' => true]); ?>
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

                                <div id="preview-container" class="d-flex gap-2 mt-2 flex-wrap"></div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <?php if (isset($component)) { $__componentOriginal84b78d66d5203b43b9d8c22236838526 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal84b78d66d5203b43b9d8c22236838526 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\Button::resolve(['label' => 'Batal','theme' => 'outline-danger','icon' => 'fas fa-times'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Form\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['onclick' => 'window.history.back()','class' => 'mr-2']); ?>
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
                        <?php if (isset($component)) { $__componentOriginal84b78d66d5203b43b9d8c22236838526 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal84b78d66d5203b43b9d8c22236838526 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\Button::resolve(['label' => 'Perbarui','theme' => 'primary','icon' => 'fas fa-save','type' => 'submit'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Form\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('css'); ?>
    <style>
        .section-header {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
            margin-bottom: 20px;
        }

        .section-header h4 {
            color: #444;
            font-weight: 600;
        }

        .thumbnail-item {
            width: 120px;
        }

        .thumbnail-item img {
            border-radius: 5px;
        }

        .img-thumbnail {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
        }

        .preview-container {
            border: 2px dashed #ddd;
            padding: 10px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelector('input[name="thumbnail[]"]').addEventListener('change', function(e) {
            const previewContainer = document.getElementById('preview-container');
            previewContainer.innerHTML = ''; // reset preview

            const files = e.target.files;
            if (files.length > 0) {
                Array.from(files).forEach(file => {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.classList.add('img-thumbnail');
                    img.style.maxHeight = '120px';
                    img.style.objectFit = 'cover';
                    previewContainer.appendChild(img);
                });
            }
        });

        $(document).on('click', '.btn-delete-thumbnail', function() {
            let thumbId = $(this).data('thumbnail-id');

            Swal.fire({
                title: 'Yakin hapus gambar ini?',
                text: "Data yang dihapus tidak bisa dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/thumbnails/' + thumbId,
                        type: 'DELETE',
                        data: {
                            _token: '<?php echo e(csrf_token()); ?>'
                        },
                        success: function(res) {
                            if (res.success) {
                                $('#thumb-' + thumbId).remove();
                                Swal.fire('Berhasil', res.message, 'success');
                            }
                        }
                    });
                }
            });
        });

        <?php if(session('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?php echo e(session('success')); ?>',
                timer: 3000,
                showConfirmButton: false
            });
        <?php endif; ?>

        <?php if(session('error')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '<?php echo e(session('error')); ?>',
                timer: 3000,
                showConfirmButton: false
            });
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389110718/domains/biepluskampunginggris.com/kampung_inggris_plus/resources/views/admin/programs/camp/edit.blade.php ENDPATH**/ ?>