<?php $__env->startSection('title', 'Edit Program Offline'); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="m-0 text-dark">Edit Program Offline: <?php echo e($offline->nama); ?></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Edit Program Offline</h3>
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

            <form action="<?php echo e(route('admin.offline.update', $offline->id)); ?>" method="POST"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="card-body">
                    
                    <h5 class="mb-3">Informasi Dasar</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Program</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nama"
                                    name="nama" value="<?php echo e(old('nama', $offline->nama)); ?>">
                                <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="program_bahasa">Program Bahasa</label>
                                <select class="form-control <?php $__errorArgs = ['program_bahasa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="program_bahasa" name="program_bahasa">
                                    <option value="" disabled>-- Pilih Bahasa --</option>
                                    <option value="inggris" <?php echo e(old('program_bahasa', $offline->program_bahasa) == 'inggris' ? 'selected' : ''); ?>>
                                        Bahasa Inggris</option>
                                    <option value="jerman" <?php echo e(old('program_bahasa', $offline->program_bahasa) == 'jerman' ? 'selected' : ''); ?>>Bahasa
                                        Jerman</option>
                                    <option value="mandarin" <?php echo e(old('program_bahasa', $offline->program_bahasa) == 'mandarin' ? 'selected' : ''); ?>>
                                        Bahasa Mandarin</option>
                                    <option value="arab" <?php echo e(old('program_bahasa', $offline->program_bahasa) == 'arab' ? 'selected' : ''); ?>>Bahasa
                                        Arab</option>
                                    <option value="nhc" <?php echo e(old('program_bahasa', $offline->program_bahasa) == 'nhc' ? 'selected' : ''); ?>>NHC

                                    </option>
                                </select>
                                <?php $__errorArgs = ['program_bahasa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="slug"
                                    name="slug" value="<?php echo e(old('slug', $offline->slug)); ?>">
                                <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lama_program">Lama Program</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['lama_program'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="lama_program" name="lama_program"
                                    value="<?php echo e(old('lama_program', $offline->lama_program)); ?>">
                                <?php $__errorArgs = ['lama_program'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="kategori" name="kategori" value="<?php echo e(old('kategori', $offline->kategori)); ?>">
                                <?php $__errorArgs = ['kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    
                    <h5 class="mt-4 mb-3">Detail Program</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga">Harga (Rp)</label>
                                <input type="number" class="form-control <?php $__errorArgs = ['harga'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="harga" name="harga" value="<?php echo e(old('harga', $offline->harga)); ?>">
                                <?php $__errorArgs = ['harga'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lokasi">Lokasi</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['lokasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="lokasi" name="lokasi" value="<?php echo e(old('lokasi', $offline->lokasi)); ?>">
                                <?php $__errorArgs = ['lokasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jadwal_mulai">Jadwal Mulai</label>
                                <input type="date" class="form-control" id="jadwal_mulai" name="jadwal_mulai"
                                    value="<?php echo e(old('jadwal_mulai', $offline->jadwal_mulai)); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jadwal_selesai">Jadwal Selesai</label>
                                <input type="date" class="form-control" id="jadwal_selesai" name="jadwal_selesai"
                                    value="<?php echo e(old('jadwal_selesai', $offline->jadwal_selesai)); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kuota">Kuota</label>
                                <input type="number" class="form-control" id="kuota" name="kuota"
                                    value="<?php echo e(old('kuota', $offline->kuota)); ?>">
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label for="is_active">Status Program</label>
                        <select class="form-control" id="is_active" name="is_active">
                            <option value="1" <?php echo e(old('is_active', $offline->is_active) == 1 ? 'selected' : ''); ?>>Aktif
                            </option>
                            <option value="0" <?php echo e(old('is_active', $offline->is_active) == 0 ? 'selected' : ''); ?>>Nonaktif
                            </option>
                        </select>
                    </div>

                    
                    <h5 class="mt-4 mb-3">Thumbnail Program</h5>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail"
                                accept="image/*">
                            <label class="custom-file-label" for="thumbnail">Pilih file</label>
                        </div>
                        <small class="form-text text-muted">Format: JPG, PNG, GIF. Maks 2MB.</small>

                        <?php if($offline->thumbnail): ?>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="hapus_thumbnail" value="1"
                                    id="hapus_thumbnail">
                                <label class="form-check-label" for="hapus_thumbnail">Hapus thumbnail saat simpan</label>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <p class="font-weight-bold">Thumbnail Saat Ini:</p>
                                    <img src="<?php echo e(asset('storage/' . $offline->thumbnail)); ?>" class="img-thumbnail"
                                        width="200">
                                </div>
                                <div class="col-md-6" id="newThumbnailPreview" style="display:none;">
                                    <p class="font-weight-bold">Pratinjau Thumbnail Baru:</p>
                                    <img id="previewImage" class="img-thumbnail" src="#" width="200">
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    
                    <h5 class="mt-4 mb-3">Fitur Program</h5>
                    <div class="form-group">
                       <textarea class="form-control" id="features_program" name="features_program" rows="4"><?php echo e(old('features_program', $offline->features_program ?? '')); ?></textarea>


                        <small class="form-text text-muted">Gunakan ✅ dan Enter untuk setiap fitur baru</small>
                    </div>
                </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
            <a href="<?php echo e(route('admin.offline.index')); ?>" class="btn btn-secondary ml-2">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
        </form>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<style>
    .img-thumbnail {
        max-height: 200px;
        object-fit: cover;
    }

    .custom-file-label::after {
        content: "Browse";
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Preview uploaded image
    document.getElementById('thumbnail').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('previewImage').src = e.target.result;
                document.getElementById('newThumbnailPreview').style.display = 'block';
            }
            reader.readAsDataURL(file);

            // Update custom file label
            const fileName = file.name;
            const label = document.querySelector('.custom-file-label');
            label.textContent = fileName;
        }
    });

    // Auto generate slug from nama
    document.getElementById('nama').addEventListener('input', function () {
        const nama = this.value;
        const slug = nama.toLowerCase()
            .replace(/[^a-z0-9 -]/g, '') // Remove invalid chars
            .replace(/\s+/g, '-') // Replace spaces with -
            .replace(/-+/g, '-'); // Replace multiple - with single -

        document.getElementById('slug').value = slug;
    });
</script>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389110718/domains/biepluskampunginggris.com/kampung_inggris_plus/resources/views/admin/programs/offline/edit.blade.php ENDPATH**/ ?>