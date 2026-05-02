
<?php $__env->startSection('content'); ?>

<div class="container py-5">
    <h2 class="text-center mb-4">Pilih Kamar Camp</h2>

    <?php
        use App\Helpers\RoomDummy as RD;
    ?>

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


    <?php $__env->startSection('content'); ?>
            <style>
                .room-layout-wrapper {
                    padding: 20px;
                }

                .gender-title {
                    font-weight: bold;
                    margin-bottom: 10px;
                    text-align: center;
                    font-size: 18px;
                    color: #555;
                }

                .room-grid {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 10px;
                    justify-content: center;
                }

                .room-card {
                    width: 60px;
                    height: 60px;
                    border-radius: 8px;
                    background-color: #f3f3f3;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    font-size: 12px;
                    cursor: pointer;
                    border: 2px solid transparent;
                    transition: 0.3s ease;
                    position: relative;



                }

                .room-full {
                    background-color: #ef4444 !important;
                    /* Merah */
                }

                .room-partial {
                    background-color: #facc15 !important;
                    /* Kuning */
                }

                .room-empty {
                    background-color: #22c55e !important;
                    /* Hijau */
                }


                .room-card:hover {
                    transform: scale(1.05);
                    border-color: #007bff;
                }

                .room-card.occupied {
                    background-color: #ffc4c4;
                    border-color: #ff0000;
                }

                .room-card.available {
                    background-color: #c8facc;
                    border-color: #28a745;
                }

                .room-number {
                    font-weight: bold;
                }

                .room-status {
                    font-size: 10px;
                    color: #666;
                }
            </style>




            <form action="<?php echo e(route('camp.proseskamaruser')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="trx_id" value="<?php echo e($trx_id); ?>">
                <input type="hidden" name="nama_kamar" id="inputNamaKamar">
                <input type="hidden" name="kamar_id" id="inputKamarId">


                <div id="selectedRoomInfo" class="alert alert-info d-none text-center mt-3">
                    <?php if(auth()->check() && auth()->user()->role === 'admin'): ?>
                        Kamar dipilih: <strong id="selectedRoomName"></strong>
                    <?php else: ?>
                        Kamar telah dipilih
                        
                        <strong id="selectedRoomName" class="d-none"></strong>
                    <?php endif; ?>
                </div>

                <div class="text-center"> <!-- Tambahkan wrapper center -->
                    <button type="submit" class="btn btn-primary mt-3" id="submitBtn" disabled>
                        Lanjut ke Pembayaran
                    </button>
                </div>
            </form>



            
            <input type="hidden" name="nama_kamar" id="inputNamaKamar">
            <input type="hidden" name="kamar_id" id="inputKamarId">

            
            <div id="selectedRoomInfo" class="alert alert-info d-none">
                Kamar terpilih: <strong id="selectedRoomName"></strong>
            </div>

            
            <div class="room-layout-wrapper">
                <h4 class="text-center mb-4">Layout Kamar VVIP - <?php echo e(ucfirst($pendaftar->gender)); ?></h4>
                <div class="row">

                    <?php if($pendaftar->gender === 'putri'): ?>
                        
                        <div class="col-md-12">
                            <div class="gender-column">
                                <div class="gender-title">Putri</div>
                                <div class="room-grid">
                                    <?php $__currentLoopData = RD::filter($rooms, 'A', 19, 23); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kamar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($kamar->gender === 'putri' && $kamar->nomor_kamar !== 'A-12A'): ?>
                                            <?php
                                                $penghuniAktif = $penghuniAktifPerRoom[$kamar->id] ?? 0;
                                                $isFull = $penghuniAktif >= $kamar->kapasitas;
                                                $isInactive = $kamar->status === 'nonaktif';
                                            ?>
                                            <div class="room-card <?php echo e(RD::getStatusClass($kamar, $penghuniAktif)); ?>"
                                                data-id="<?php echo e($kamar->id); ?>" data-nama="<?php echo e($kamar->nomor_kamar); ?>"
                                                data-kamar="<?php echo e($kamar->nomor_kamar); ?>" data-gender="<?php echo e($kamar->gender); ?>"
                                                data-kategori="<?php echo e($kamar->kategori); ?>" data-kapasitas="<?php echo e($kamar->kapasitas); ?>"
                                                data-penghuni="<?php echo e($kamar->penghuni); ?>" <?php if (! ($isFull || $isInactive)): ?>
                                                onclick="selectRoom(this)" role="button" <?php endif; ?>
                                                style="<?php echo e($isFull || $isInactive ? 'cursor: not-allowed; opacity: 0.6;' : ''); ?>">

                                                
                                                <span class="room-number"><?php echo e($kamar->nomor_kamar); ?></span>

                                                <span class="room-status"><?php echo e(RD::getStatusText($kamar, $penghuniAktif)); ?></span>
                                                <span class="room-capacity">
                                                    <?php echo e($kamar->kapasitas); ?>/<?php echo e($penghuniAktif); ?>

                                                </span>
                                            </div>

                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    <?php elseif($pendaftar->gender === 'putra'): ?>
                        
                        <div class="col-md-12">
                            <div class="gender-column">
                                <div class="gender-title">Putra</div>
                                <div class="room-grid">
                                    <?php $__currentLoopData = RD::filter($rooms, 'A', 24, 28); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kamar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($kamar->gender === 'putra'): ?>
                                            <?php
                                                $penghuniAktif = $penghuniAktifPerRoom[$kamar->id] ?? 0;
                                                $isFull = $penghuniAktif >= $kamar->kapasitas;
                                                $isInactive = $kamar->status === 'nonaktif';

                                            ?>
                                            <div class="room-card <?php echo e(RD::getStatusClass($kamar, $penghuniAktif)); ?>"
                                                data-id="<?php echo e($kamar->id); ?>" data-nama="<?php echo e($kamar->nomor_kamar); ?>"
                                                data-kamar="<?php echo e($kamar->nomor_kamar); ?>" data-gender="<?php echo e($kamar->gender); ?>"
                                                data-kategori="<?php echo e($kamar->kategori); ?>" data-kapasitas="<?php echo e($kamar->kapasitas); ?>"
                                                data-penghuni="<?php echo e($kamar->penghuni); ?>" <?php if (! ($isFull || $isInactive)): ?>
                                                onclick="selectRoom(this)" role="button" <?php endif; ?>
                                                style="<?php echo e($isFull || $isInactive ? 'cursor: not-allowed; opacity: 0.6;' : ''); ?>">

                                                
                                                <?php if(auth()->check() && auth()->user()->role === 'admin'): ?>
                                                    <span class="room-number"><?php echo e($kamar->nomor_kamar); ?></span>
                                                <?php else: ?>
                                                    
                                                    <span class="room-number d-none"><?php echo e($kamar->nomor_kamar); ?></span>
                                                <?php endif; ?>

                                                <span class="room-status"><?php echo e(RD::getStatusText($kamar, $penghuniAktif)); ?></span>
                                                <span class="room-capacity">
                                                    <?php echo e($kamar->kapasitas); ?>/<?php echo e($penghuniAktif); ?>

                                                </span>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            
            <div class="room-section mt-5">
                <h4 class="text-center mb-4">Layout Kamar VIP - <?php echo e(ucfirst($pendaftar->gender)); ?></h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="gender-column">
                            <div class="gender-title"><?php echo e(ucfirst($pendaftar->gender)); ?></div>
                            <div class="room-grid">
                                <?php
                                    $vipRooms = collect();

                                    if ($pendaftar->gender === 'putri') {
                                        $vipRooms = collect()
                                            ->merge(RD::filter($rooms, 'A', 1, 18, 'putri'))
                                            ->merge(RD::filter($rooms, 'B', 1, 25, 'putri'))
                                            ->merge(RD::filter($rooms, 'C', 1, 25, 'putri'))
                                            ->reject(
                                                fn($k) => $k->nomor_kamar === 'A-12A' || strtoupper($k->kategori) !== 'VIP',
                                            );
                                    } elseif ($pendaftar->gender === 'putra') {
                                        $vipRooms = collect()
                                            ->merge(
                                                RD::filter($rooms, 'A', 29, 46, 'putra')->reject(
                                                    fn($k) => $k->nomor_kamar === 'A-35' ||
                                                    ($k->nomor_kamar >= 'A-24' && $k->nomor_kamar <= 'A-28') ||
                                                    strtoupper($k->kategori) !== 'VIP',
                                                ),
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
                                    }
                                ?>

                                <?php $__currentLoopData = $vipRooms->unique('nomor_kamar'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kamar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $penghuniAktif = $penghuniAktifPerRoom[$kamar->id] ?? 0;
                                        $isFull = $penghuniAktif >= $kamar->kapasitas;
                                        $isInactive = $kamar->status === 'nonaktif';
                                    ?>
                                    <div class="room-card <?php echo e(RD::getStatusClass($kamar, $penghuniAktif)); ?>"
                                        data-id="<?php echo e($kamar->id); ?>" data-nama="<?php echo e($kamar->nomor_kamar); ?>"
                                        data-kamar="<?php echo e($kamar->nomor_kamar); ?>" data-gender="<?php echo e($kamar->gender); ?>"
                                        data-kategori="<?php echo e($kamar->kategori); ?>" data-kapasitas="<?php echo e($kamar->kapasitas); ?>"
                                        data-penghuni="<?php echo e($kamar->penghuni); ?>" <?php if (! ($isFull || $isInactive)): ?>
                                        onclick="selectRoom(this)" role="button" <?php endif; ?>
                                        style="<?php echo e($isFull || $isInactive ? 'cursor: not-allowed; opacity: 0.6;' : ''); ?>">

                                        
                                        <span class="room-number"><?php echo e($kamar->nomor_kamar); ?></span>

                                        <span class="room-status"><?php echo e(RD::getStatusText($kamar, $penghuniAktif)); ?></span>
                                        <span class="room-capacity">
                                            <?php echo e($kamar->kapasitas); ?>/<?php echo e($penghuniAktif); ?>

                                        </span>
                                    </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="room-section mt-5">
                <h4 class="text-center mb-4">Layout Kamar Barack - <?php echo e(ucfirst($pendaftar->gender)); ?></h4>
                <h3 class="section-title">Kamar Barack</h3>
                <div class="row">
                    
                    <?php if($pendaftar->gender === 'putri'): ?>
                        <div class="col-md-6">
                            <div class="gender-column">
                                <div class="gender-title">Putri</div>
                                <div class="room-grid">
                                    <?php
                                        $kamarPutriBarack = $rooms->firstWhere('nomor_kamar', 'A-12A');
                                    ?>

                                    <?php if($kamarPutriBarack): ?>
                                        <?php
                                            $kamar = $kamarPutriBarack;
                                            $penghuniAktif = $penghuniAktifPerRoom[$kamar->id] ?? 0;
                                            $isFull = $penghuniAktif >= $kamar->kapasitas;
                                            $isInactive = $kamar->status === 'nonaktif';
                                        ?>

                                        <div class="room-card <?php echo e(RD::getStatusClass($kamar, $penghuniAktif)); ?>"
                                            data-id="<?php echo e($kamar->id); ?>" data-nama="<?php echo e($kamar->nomor_kamar); ?>"
                                            data-kamar="<?php echo e($kamar->nomor_kamar); ?>" data-gender="<?php echo e($kamar->gender); ?>"
                                            data-kategori="<?php echo e($kamar->kategori); ?>" data-kapasitas="<?php echo e($kamar->kapasitas); ?>"
                                            data-penghuni="<?php echo e($kamar->penghuni); ?>" <?php if (! ($isFull || $isInactive)): ?>
                                            onclick="selectRoom(this)" role="button" <?php endif; ?>
                                            style="<?php echo e($isFull || $isInactive ? 'cursor: not-allowed; opacity: 0.6;' : ''); ?>">
                                            
                                            <?php if(auth()->check() && auth()->user()->role === 'admin'): ?>
                                                <span class="room-number"><?php echo e($kamar->nomor_kamar); ?></span>
                                            <?php else: ?>
                                                
                                                <span class="room-number d-none"><?php echo e($kamar->nomor_kamar); ?></span>
                                            <?php endif; ?>

                                            <span class="room-status"><?php echo e(RD::getStatusText($kamar, $penghuniAktif)); ?></span>
                                            <span class="room-capacity">
                                                <?php echo e($kamar->kapasitas); ?>/<?php echo e($penghuniAktif); ?>

                                            </span>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>

                        
                    <?php elseif($pendaftar->gender === 'putra'): ?>
                        <div class="col-md-6">
                            <div class="gender-column">
                                <div class="gender-title">Putra</div>
                                <div class="room-grid">
                                    <?php
                                        $kamarPutraBarack = $rooms->firstWhere('nomor_kamar', 'A-35');
                                    ?>

                                    <?php if($kamarPutraBarack): ?>
                                        <?php
                                            $kamar = $kamarPutraBarack;
                                            $penghuniAktif = $penghuniAktifPerRoom[$kamar->id] ?? 0;
                                            $isFull = $penghuniAktif >= $kamar->kapasitas;
                                            $isInactive = $kamar->status === 'nonaktif'; //
                                        ?>

                                        <div class="room-card <?php echo e(RD::getStatusClass($kamar, $penghuniAktif)); ?>"
                                            data-id="<?php echo e($kamar->id); ?>" data-nama="<?php echo e($kamar->nomor_kamar); ?>"
                                            data-kamar="<?php echo e($kamar->nomor_kamar); ?>" data-gender="<?php echo e($kamar->gender); ?>"
                                            data-kategori="<?php echo e($kamar->kategori); ?>" data-kapasitas="<?php echo e($kamar->kapasitas); ?>"
                                            data-penghuni="<?php echo e($kamar->penghuni); ?>" <?php if (! ($isFull || $isInactive)): ?>
                                            onclick="selectRoom(this)" role="button" <?php endif; ?>
                                            style="<?php echo e($isFull || $isInactive ? 'cursor: not-allowed; opacity: 0.6;' : ''); ?>">

                                            
                                            <span class="room-number"><?php echo e($kamar->nomor_kamar); ?></span>

                                            <span class="room-status"><?php echo e(RD::getStatusText($kamar, $penghuniAktif)); ?></span>
                                            <span class="room-capacity">
                                                <?php echo e($kamar->kapasitas); ?>/<?php echo e($penghuniAktif); ?>

                                            </span>
                                        </div>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>



        </div>

        <script>
            function selectRoom(element) {
                const kamarId = element.getAttribute('data-id');
                const namaKamar = element.getAttribute('data-nama');

                console.log("Selected Room ID:", kamarId);
                console.log("Selected Room Name:", namaKamar);

                document.getElementById('inputKamarId').value = kamarId;
                document.getElementById('inputNamaKamar').value = namaKamar;

                document.getElementById('selectedRoomName').textContent = namaKamar;
                document.getElementById('selectedRoomInfo').classList.remove('d-none');

                document.querySelectorAll('.room-card').forEach(card => card.classList.remove('selected-room'));
                element.classList.add('selected-room');

                // Enable tombol submit
                document.getElementById('submitBtn').disabled = false;
            }
        </script>

        
        <style>
            .room-card.selected-room {
                border: 3px solid #007bff;
                box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
            }
        </style>


    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389110718/domains/mykampunginggris.com/kampung_inggris_plus/resources/views/camp/room.blade.php ENDPATH**/ ?>