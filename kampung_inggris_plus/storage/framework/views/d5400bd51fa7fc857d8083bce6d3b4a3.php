    

    <?php $__env->startSection('title', 'Manajemen Kamar'); ?>

    <?php $__env->startSection('content_header'); ?>
        <h1 class="text-center font-weight-bold">Manajemen Kamar</h1>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>
        <?php
            use App\Helpers\RoomDummy as RD;
        ?>

        <?php $__env->startPush('css'); ?>
            <link rel="stylesheet" href="<?php echo e(asset('css/room.css')); ?>">
        <?php $__env->stopPush(); ?>

    <?php $__env->startSection('meta'); ?>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php $__env->stopSection(); ?>


    <div class="main-container">
        <div class="dashboard-card">
            <div class="card-header-custom">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Dashboard Kamar</h3>
                    <div class="card-tools">
                        <span class="badge badge-success">Total Kamar: <?php echo e($rooms->count()); ?></span>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="mt-3 ms-3">
                        <?php if (isset($component)) { $__componentOriginal84b78d66d5203b43b9d8c22236838526 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal84b78d66d5203b43b9d8c22236838526 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\Button::resolve(['label' => 'Atur Kapasitas & Kategori','theme' => 'primary','icon' => 'fas fa-edit'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Form\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-toggle' => 'modal','data-target' => '#aturKapasitasKategori']); ?>
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


                    <div class="col-12 col-md-9 col-lg-6">
                        <?php if (isset($component)) { $__componentOriginale5d826ae10df3aa87f8449f474c11664 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale5d826ae10df3aa87f8449f474c11664 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\Input::resolve(['name' => 'search'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => 'Cari kamar...','class' => 'search-box']); ?>
                             <?php $__env->slot('appendSlot', null, []); ?> 
                                <?php if (isset($component)) { $__componentOriginal84b78d66d5203b43b9d8c22236838526 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal84b78d66d5203b43b9d8c22236838526 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\Button::resolve(['theme' => 'outline-primary','icon' => 'fas fa-search'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                             <?php $__env->endSlot(); ?>
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

                    <form method="POST" action="<?php echo e(route('admin.rooms.update-by-kategori')); ?>">
                        <?php echo csrf_field(); ?>

                        <?php if (isset($component)) { $__componentOriginale2dfb698641700bc6575e0f9f2d3d632 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale2dfb698641700bc6575e0f9f2d3d632 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Tool\Modal::resolve(['id' => 'aturKapasitasKategori','title' => 'Atur Kapasitas Kategori Kamar','theme' => 'primary','icon' => 'fas fa-edit','size' => 'md'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Tool\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

                            <?php if (isset($component)) { $__componentOriginal377f5828c1076ae12e071b1688061877 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal377f5828c1076ae12e071b1688061877 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\Select::resolve(['name' => 'kategori','label' => 'Kategori Kamar'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Form\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['required' => true]); ?>
                                <option value="vvip">VVIP</option>
                                <option value="vip">VIP</option>
                                <option value="barack">Barack</option>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal377f5828c1076ae12e071b1688061877)): ?>
<?php $attributes = $__attributesOriginal377f5828c1076ae12e071b1688061877; ?>
<?php unset($__attributesOriginal377f5828c1076ae12e071b1688061877); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal377f5828c1076ae12e071b1688061877)): ?>
<?php $component = $__componentOriginal377f5828c1076ae12e071b1688061877; ?>
<?php unset($__componentOriginal377f5828c1076ae12e071b1688061877); ?>
<?php endif; ?>

                            <?php if (isset($component)) { $__componentOriginale5d826ae10df3aa87f8449f474c11664 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale5d826ae10df3aa87f8449f474c11664 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\Input::resolve(['name' => 'kapasitas','label' => 'Kapasitas Baru'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Form\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','min' => '1','required' => true]); ?>
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

                             <?php $__env->slot('footerSlot', null, []); ?> 
                                <?php if (isset($component)) { $__componentOriginal84b78d66d5203b43b9d8c22236838526 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal84b78d66d5203b43b9d8c22236838526 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Form\Button::resolve(['theme' => 'success','label' => 'Update','icon' => 'fas fa-save','type' => 'submit'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    </form>




                </div>
            </div>



            <div class="legend-container">
                <div class="legend-item">
                    <div class="legend-color" style="background-color: var(--success-color);"></div>
                    <span>Kosong</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background-color: var(--warning-color);"></div>
                    <span>Sebagian Terisi</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background-color: var(--danger-color);"></div>
                    <span>Penuh</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background-color: #6c757d;"></div>
                    <span>Tidak Aktif / Dalam Perbaikan</span>
                </div>
            </div>


            
            <div class="room-section">
                <h3 class="section-title">Kamar VVIP</h3>

                <div class="row">
                    <div class="col-md-6">
                        <div class="gender-column">
                            <div class="gender-title">Putri</div>
                            <div class="room-grid">
                                <?php $__currentLoopData = RD::filter($rooms, 'A', 19, 23); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kamar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($kamar->nomor_kamar != 'A-12A'): ?>
                                        <?php
                                            $penghuniAktif = $penghuniAktifPerRoom[$kamar->id] ?? 0;
                                        ?>

                                        <div class="room-card <?php echo e(RD::getStatusClass($kamar, $penghuniAktif)); ?>"
                                            data-id="<?php echo e($kamar->id); ?>" data-nama="<?php echo e($kamar->nomor_kamar); ?>"
                                            data-kamar="<?php echo e($kamar->nomor_kamar); ?>" data-gender="<?php echo e($kamar->gender); ?>"
                                            data-kategori="<?php echo e($kamar->kategori); ?>"
                                            data-kapasitas="<?php echo e($kamar->kapasitas); ?>"
                                            data-penghuni="<?php echo e($penghuniAktif); ?>" onclick="openEditModal(this)">

                                            <span class="room-number"><?php echo e($kamar->nomor_kamar); ?></span>
                                            <span
                                                class="room-status"><?php echo e(RD::getStatusText($kamar, $penghuniAktif)); ?></span>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="gender-column">
                            <div class="gender-title">Putra</div>
                            <div class="room-grid">
                                <?php $__currentLoopData = RD::filter($rooms, 'A', 24, 28); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kamar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $penghuniAktif = $penghuniAktifPerRoom[$kamar->id] ?? 0;
                                    ?>

                                    <div class="room-card <?php echo e(RD::getStatusClass($kamar, $penghuniAktif)); ?>"
                                        data-id="<?php echo e($kamar->id); ?>" data-nama="<?php echo e($kamar->nomor_kamar); ?>"
                                        data-kamar="<?php echo e($kamar->nomor_kamar); ?>" data-gender="<?php echo e($kamar->gender); ?>"
                                        data-kategori="<?php echo e($kamar->kategori); ?>"
                                        data-kapasitas="<?php echo e($kamar->kapasitas); ?>" data-penghuni="<?php echo e($penghuniAktif); ?>"
                                        onclick="openEditModal(this)">

                                        <span class="room-number"><?php echo e($kamar->nomor_kamar); ?></span>
                                        <span
                                            class="room-status"><?php echo e(RD::getStatusText($kamar, $penghuniAktif)); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="room-section">
                <h3 class="section-title">Kamar VIP</h3>

                <div class="row">
                    <div class="col-md-6">
                        <div class="gender-column">
                            <div class="gender-title">Putri</div>
                            <div class="room-grid">
                                <?php
                                    $vipPutri = collect()
                                        ->merge(RD::filter($rooms, 'A', 1, 18))
                                        ->merge(RD::filter($rooms, 'B', 1, 25))
                                        ->merge(RD::filter($rooms, 'C', 1, 25))
                                        ->reject(function ($kamar) {
                                            return $kamar->nomor_kamar === 'A-12A' ||
                                                strtoupper($kamar->kategori) !== 'VIP';
                                        });
                                ?>

                                <?php $__currentLoopData = $vipPutri->unique('nomor_kamar'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kamar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="room-card <?php echo e(RD::getStatusClass($kamar)); ?>"
                                        data-id="<?php echo e($kamar->id); ?>" data-nama="<?php echo e($kamar->nomor_kamar); ?>"
                                        data-kamar="<?php echo e($kamar->nomor_kamar); ?>" data-gender="<?php echo e($kamar->gender); ?>"
                                        data-kategori="<?php echo e($kamar->kategori); ?>"
                                        data-kapasitas="<?php echo e($kamar->kapasitas); ?>"
                                        data-penghuni="<?php echo e($kamar->penghuni); ?>" onclick="openEditModal(this)">
                                        <span class="room-number"><?php echo e($kamar->nomor_kamar); ?></span>
                                        <span class="room-status"><?php echo e(RD::getStatusText($kamar)); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="gender-column">
                            <div class="gender-title">Putra</div>
                            <div class="room-grid">
                                <?php
                                    $vipPutra = collect()
                                        ->merge(
                                            RD::filter($rooms, 'A', 29, 46, 'putra')->reject(function ($k) {
                                                return $k->nomor_kamar === 'A-35' ||
                                                    ($k->nomor_kamar >= 'A-24' && $k->nomor_kamar <= 'A-28') ||
                                                    strtoupper($k->kategori) !== 'VIP';
                                            }),
                                        )
                                        ->merge(
                                            RD::filter($rooms, 'B', 26, 50, 'putra')->reject(
                                                fn($k) => strtoupper($k->kategori) !== 'VIP',
                                            ),
                                        )
                                        ->merge(
                                            RD::filter($rooms, 'C', 26, 50, 'putra')->reject(
                                                fn($k) => strtoupper($k->kategori) !== 'VIP',
                                            ),
                                        );
                                ?>

                                <?php $__currentLoopData = $vipPutra->unique('nomor_kamar'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kamar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="room-card <?php echo e(RD::getStatusClass($kamar)); ?>"
                                        data-id="<?php echo e($kamar->id); ?>" data-nama="<?php echo e($kamar->nomor_kamar); ?>"
                                        data-kamar="<?php echo e($kamar->nomor_kamar); ?>" data-gender="<?php echo e($kamar->gender); ?>"
                                        data-kategori="<?php echo e($kamar->kategori); ?>"
                                        data-kapasitas="<?php echo e($kamar->kapasitas); ?>"
                                        data-penghuni="<?php echo e($kamar->penghuni); ?>" onclick="openEditModal(this)">
                                        <span class="room-number"><?php echo e($kamar->nomor_kamar); ?></span>
                                        <span class="room-status"><?php echo e(RD::getStatusText($kamar)); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="room-section">
                <h3 class="section-title">Kamar Barack</h3>

                <div class="row">
                    <div class="col-md-6">
                        <div class="gender-column">
                            <div class="gender-title">Putri</div>
                            <div class="room-grid">
                                <?php $kamarPutriBarack = $rooms->firstWhere('nomor_kamar', 'A-12A'); ?>
                                <?php if($kamarPutriBarack): ?>
                                    <div class="room-card <?php echo e(RD::getStatusClass($kamarPutriBarack)); ?>"
                                        data-id="<?php echo e($kamarPutriBarack->id); ?>"
                                        data-nama="<?php echo e($kamarPutriBarack->nomor_kamar); ?>"
                                        data-kamar="<?php echo e($kamarPutriBarack->nomor_kamar); ?>"
                                        data-gender="<?php echo e($kamarPutriBarack->gender); ?>"
                                        data-kategori="<?php echo e($kamarPutriBarack->kategori); ?>"
                                        data-kapasitas="<?php echo e($kamarPutriBarack->kapasitas); ?>"
                                        data-penghuni="<?php echo e($kamarPutriBarack->penghuni); ?>"
                                        onclick="openEditModal(this)">

                                        <span class="room-number"><?php echo e($kamarPutriBarack->nomor_kamar); ?></span>
                                        <span class="room-status"><?php echo e(RD::getStatusText($kamarPutriBarack)); ?></span>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="gender-column">
                            <div class="gender-title">Putra</div>
                            <div class="room-grid">
                                <?php $kamarPutraBarack = $rooms->firstWhere('nomor_kamar', 'A-35'); ?>
                                <?php if($kamarPutraBarack): ?>
                                    <div class="room-card <?php echo e(RD::getStatusClass($kamarPutraBarack)); ?>"
                                        data-id="<?php echo e($kamarPutraBarack->id); ?>"
                                        data-nama="<?php echo e($kamarPutraBarack->nomor_kamar); ?>"
                                        data-kamar="<?php echo e($kamarPutraBarack->nomor_kamar); ?>"
                                        data-gender="<?php echo e($kamarPutraBarack->gender); ?>"
                                        data-kategori="<?php echo e($kamarPutraBarack->kategori); ?>"
                                        data-kapasitas="<?php echo e($kamarPutraBarack->kapasitas); ?>"
                                        data-penghuni="<?php echo e($kamarPutraBarack->penghuni); ?>"
                                        onclick="openEditModal(this)">
                                        <span class="room-number"><?php echo e($kamarPutraBarack->nomor_kamar); ?></span>
                                        <span class="room-status"><?php echo e(RD::getStatusText($kamarPutraBarack)); ?></span>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal Edit Room -->
    <div class="modal fade" id="roomModal" tabindex="-1" aria-labelledby="roomModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="roomModalLabel">Edit Kamar</h5>
                </div>
                <div class="modal-body">
                    <form id="roomEditForm">
                        <input type="hidden" id="modalRoomId" name="id">

                        <div class="mb-3">
                            <label for="modalRoomNama" class="form-label">Nomor Kamar</label>
                            <input type="text" class="form-control" id="modalRoomNama" name="nomor_kamar"
                                readonly>
                        </div>

                        <div class="mb-3">
                            <label for="modalRoomGender" class="form-label">Gender</label>
                            <select class="form-select" id="modalRoomGender" name="gender">
                                <option value="putra">PUTRA</option>
                                <option value="putri">PUTRI</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="modalRoomKategori" class="form-label">Kategori</label>
                            <select class="form-select" id="modalRoomKategori" name="kategori">
                                <option value="vvip">VVIP</option>
                                <option value="vip">VIP</option>
                                <option value="barack">BARACK</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="modalRoomStatus" class="form-label">Status Kamar</label>
                            <select class="form-select" id="modalRoomStatus" name="status">
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Nonaktif</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="modalRoomKapasitas" class="form-label">Kapasitas</label>
                            <input type="number" class="form-control" id="modalRoomKapasitas" name="kapasitas"
                                min="1">
                        </div>

                        <div class="mb-3">
                            <label for="modalRoomPenghuni" class="form-label">Penghuni</label>
                            <input type="number" class="form-control" id="modalRoomPenghuni" name="penghuni"
                                min="0" readonly>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Penghuni Kamar</label>
                            <ul id="listPenghuni" class="list-group">

                            </ul>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" onclick="saveRoomChanges()">Simpan
                        Perubahan</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Pindah Peserta -->
    <div class="modal fade" id="modalPindahPeserta" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pindahkan Peserta</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div id="pesertaListPindah">
                        <!-- Daftar peserta akan dimuat di sini via JS -->
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- Jika kamu ternyata pakai Bootstrap 4 -->
                    <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>

                </div>
            </div>
        </div>
    </div>




    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap 5 JS (include Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

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

    <?php if(count($penghuniExpired) > 0): ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Ada Penghuni Melebihi Durasi',
                html: `
                <ul style="text-align: left;">
                    <?php $__currentLoopData = $penghuniExpired; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <strong><?php echo e($p['nama']); ?></strong> - Kamar <strong><?php echo e($p['nama_kamar']); ?></strong><br>
                            Durasi: <?php echo e($p['durasi']); ?> (Expired: <?php echo e($p['expired_at']); ?>)<br>
                            <a href="https://wa.me/<?php echo e(preg_replace('/^0/', '62', preg_replace('/\D/', '', $p['no_hp']))); ?>" target="_blank">Hubungi via WA</a>
                        </li><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            `,
                confirmButtonText: 'OK',
                width: 600
            });
        </script>
    <?php endif; ?>


    
    <script>
        document.querySelectorAll('.room-card').forEach(card => {
            card.addEventListener('click', function() {
                document.querySelectorAll('.room-card').forEach(c => c.classList.remove('selected'));
                this.classList.add('selected');

                const roomNumber = this.getAttribute('data-kamar');
                console.log('Kamar dipilih:', roomNumber);

                // 🔥 Tambahkan ini agar modal terbuka
                openEditModal(this);
            });
        });


        // Search functionality
        const searchInput = document.querySelector('input[name="search"]');
        const searchButton = searchInput.nextElementSibling.querySelector('button');

        searchButton.addEventListener('click', function() {
            const searchTerm = searchInput.value.toLowerCase();
            const rooms = document.querySelectorAll('.room-card');

            rooms.forEach(room => {
                const roomNumber = room.getAttribute('data-kamar').toLowerCase();
                if (roomNumber.includes(searchTerm)) {
                    room.style.display = 'flex';
                    room.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                    room.classList.add('selected');
                    setTimeout(() => room.classList.remove('selected'), 2000);
                } else {
                    room.style.display = 'none';
                }
            });
        });

        // Press Enter to search
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchButton.click();
            }
        });
    </script>

    <script>
        const durasiToDays = {
            perhari: 0.1,
            satu_minggu: 7,
            dua_minggu: 14,
            satu_bulan: 30,
            dua_bulan: 60,
            tiga_bulan: 90,
            enam_bulan: 180,
            satu_tahun: 365
        };

        function openEditModal(el) {
            const id = el.dataset.id;
            $('#modalRoomId').val(id);
            $('#modalRoomNama').val(el.dataset.nama);
            $('#modalRoomGender').val(el.dataset.gender);
            $('#modalRoomKategori').val(el.dataset.kategori);
            $('#modalRoomKapasitas').val(el.dataset.kapasitas);
            $('#modalRoomPenghuni').val(el.dataset.penghuni);
            $('#modalRoomStatus').val(el.dataset.status);

            $('#listPenghuni').html('<li class="list-group-item text-muted">Memuat data...</li>');

            $.get(`/admin/rooms/${id}/penghuni`, function(data) {
                $('#listPenghuni').empty();

                if (!data || data.length === 0) {
                    $('#listPenghuni').append('<li class="list-group-item text-muted">Belum ada penghuni.</li>');
                    return;
                }

                data.forEach(function(p) {
                    // Kalau status bukan diterima → langsung skip
                    if (p.status !== 'diterima') {
                        $('#listPenghuni').append(`
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>${$('<div>').text(p.nama_lengkap).html()}</strong><br>
                    <small class="text-muted">Durasi: ${p.durasi_paket}</small><br>
                    <span class="badge bg-secondary">Belum diterima</span>
                </div>
            </li>
        `);
                        return;
                    }

                    const durasiHari = durasiToDays[p.durasi_paket] || 0;
                    const startDate = p.period && p.period.date ? new Date(p.period.date) : new Date(p
                        .updated_at);
                    const endDate = new Date(startDate);
                    endDate.setDate(endDate.getDate() + durasiHari);

                    const now = new Date();
                    const timeDiff = endDate - now;

                    let countdownText = '';
                    let kontakWA = '';
                    let kickButton = '';

                    if (timeDiff > 0) {
                        const days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
                        const hours = Math.floor((timeDiff / (1000 * 60 * 60)) % 24);
                        const minutes = Math.floor((timeDiff / (1000 * 60)) % 60);
                        countdownText =
                            `<span class="badge bg-success">Sisa: ${days}h ${hours}j ${minutes}m</span>`;
                    } else {
                        countdownText = `<span class="badge bg-danger">Sudah berakhir</span>`;
                        if (p.no_hp) {
                            const cleanedNoHP = p.no_hp.replace(/^0/, '62').replace(/\D/g, '');
                            kontakWA =
                                `<br><a href="https://wa.me/${cleanedNoHP}" target="_blank" class="text-success">Hubungi via WA</a>`;
                        }
                        kickButton =
                            `<button type="button" class="btn btn-sm btn-outline-danger mt-2" onclick="kickPenghuni('${p.trx_id}', event)">Keluarkan</button>`;
                    }

                    const formattedDate = startDate.toLocaleString('id-ID', {
                        timeZone: 'Asia/Jakarta',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });

                    

                    $('#listPenghuni').append(`
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <strong>${$('<div>').text(p.nama_lengkap).html()}</strong><br>
                <small class="text-muted">Durasi: ${p.durasi_paket}</small><br>
                ${countdownText}
                ${kontakWA}
                ${kickButton}
            </div>
            <small class="text-muted">${formattedDate}</small>
        </li>
    `);
                });



            }).fail(function() {
                $('#listPenghuni').html('<li class="list-group-item text-danger">Gagal memuat data penghuni.</li>');
            });

            const modal = new bootstrap.Modal(document.getElementById('roomModal'));
            modal.show();
        }


        function kickPenghuni(trx_id, event) {
            if (event) event.preventDefault(); // cegah submit form

            Swal.fire({
                title: 'Yakin?',
                text: "Penghuni ini akan dikeluarkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, keluarkan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Panggil AJAX kalau user klik 'Ya'
                    kickPenghuniAjax(trx_id);
                }
            });
        }

        function kickPenghuniAjax(trx_id) {
            $.ajax({
                url: `/admin/rooms/penghuni/${trx_id}`,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Penghuni berhasil dikeluarkan.',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        });

                        // update UI
                        $('#listPenghuni').find(`[data-trx="${trx_id}"]`).remove();
                        if ($('#listPenghuni li').length === 0) {
                            $('#listPenghuni').html(
                                '<li class="list-group-item text-muted">Tidak ada penghuni</li>'
                            );
                        }
                        if (response.room && response.room.id) {
                            let roomCard = $(`#room-${response.room.id}`);
                            roomCard.find('.jumlah-penghuni').text(response.room.penghuni ?? 0);
                            roomCard.removeClass('room-empty room-partial room-full room-nonaktif')
                                .addClass(response.room.status_class || '');
                        }

                        // kasih jeda 1,5 detik sebelum reload
                        setTimeout(function() {
                            location.reload();
                        }, 1500);

                    } else {
                        Swal.fire('Gagal', response.message, 'error');
                    }
                },
                error: function(xhr) {
                    Swal.fire(
                        'Error',
                        'Terjadi kesalahan saat mengeluarkan penghuni.\nStatus: ' + xhr.status,
                        'error'
                    );
                }
            });
        }



        function saveRoomChanges() {
            const id = $('#modalRoomId').val();
            const formData = $('#roomEditForm').serialize() + '&_method=PUT';

            $.ajax({
                url: `/admin/rooms/${id}`,
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    const status = $('#modalRoomStatus').val();
                    const penghuni = parseInt($('#modalRoomPenghuni').val());

                    if (status === 'nonaktif' && penghuni > 0) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Kamar masih berisi penghuni!',
                            text: 'Silakan pindahkan peserta terlebih dahulu.',
                            confirmButtonText: 'Pindahkan Sekarang'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                bukaModalPindahPeserta(id);
                            }
                        });
                        return;
                    }

                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Perubahan berhasil disimpan'
                        }).then(() => location.reload());
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal menyimpan',
                            text: data.message || 'Terjadi kesalahan.'
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Terjadi kesalahan saat menyimpan perubahan.'
                    });
                }
            });
        }

        // 🔄 Buka modal untuk memindahkan peserta
        function bukaModalPindahPeserta(roomId) {
            $.ajax({
                url: `/admin/rooms/${roomId}/peserta-detail`,
                type: 'GET',
                success: function(data) {
                    let html = '';

                    if (data.peserta.length > 0) {
                        data.peserta.forEach(p => {

                            const rooms = data.filtered_rooms[p.id] || [];
                            const options = rooms.map(r =>
                                `<option value="${r.id}">${r.nomor_kamar}</option>`
                            ).join('');

                            html += `
                        <div class="d-flex align-items-center justify-content-between border p-2 mb-2">
                            <div>
                                <strong>${p.nama_lengkap}</strong><br>
                                <small>${p.trx_id ?? '-'} | ${p.gender}</small>
                            </div>
                            <div>
                                <select class="form-select d-inline-block w-auto" id="targetRoom_${p.id}">
                                    <option value="">Pilih kamar tujuan</option>
                                    ${options}
                                </select>
                                <button class="btn btn-sm btn-primary ms-2 pindah-btn" data-id="${p.id}">
                                    Pindahkan
                                </button>
                            </div>
                        </div>
                    `;
                        });
                    } else {
                        html = '<p class="text-center">Tidak ada peserta di kamar ini.</p>';
                    }

                    $('#pesertaListPindah').html(html);

                    // 🧭 Tampilkan modal Bootstrap
                    const modal = new bootstrap.Modal(document.getElementById('modalPindahPeserta'));
                    modal.show();
                },
                error: function() {
                    Swal.fire('Error', 'Gagal mengambil data peserta.', 'error');
                }
            });
        }

        // 🔁 Event handler untuk tombol "Pindahkan"
        $(document).on('click', '.pindah-btn', function() {
            const pesertaId = $(this).data('id');
            const targetRoomId = $(`#targetRoom_${pesertaId}`).val();


            if (!targetRoomId) {
                Swal.fire('Peringatan', 'Silakan pilih kamar tujuan.', 'warning');
                return;
            }

            pindahPeserta(pesertaId, targetRoomId);
        });

        // 🔧 Fungsi untuk memindahkan peserta ke kamar baru
        function pindahPeserta(pesertaId, targetRoomId) {
            console.log('Memindahkan peserta ID:', pesertaId);

            $.ajax({
                url: `/admin/peserta/${pesertaId}/pindah-kamar`,
                type: 'POST',
                data: {
                    target_room_id: targetRoomId,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.success) {
                        Swal.fire('Berhasil', 'Peserta berhasil dipindahkan.', 'success');
                        $(`#targetRoom_${pesertaId}`).closest('.d-flex').remove();
                    } else {
                        Swal.fire('Gagal', data.message || 'Terjadi kesalahan.', 'error');
                    }

                },


                error: function() {
                    Swal.fire('Error', 'Gagal memproses perpindahan.', 'error');
                }
            });
        }
    </script>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389110718/domains/biepluskampunginggris.com/kampung_inggris_plus/resources/views/admin/rooms/index.blade.php ENDPATH**/ ?>