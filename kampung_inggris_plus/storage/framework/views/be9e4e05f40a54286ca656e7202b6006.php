

<?php $__env->startSection('title', 'Pendaftar Program Camp'); ?>

<?php $__env->startSection('content_header'); ?>
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 gap-2">
        <h1 class="m-0">Daftar Pendaftar Program Camp</h1>
        <div class="d-flex flex-column flex-md-row gap-2 align-items-center">
            <div class="input-group input-group-sm" style="width: 250px;">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari...">
                <span class="input-group-append">
                    <button type="button" class="btn btn-default btn-flat">
                        <i class="fas fa-search"></i>
                    </button>
                </span>
            </div>
            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#exportModalCamp">
                <i class="fas fa-file-csv mr-1"></i> Export Camp
            </button>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>


    <!-- Modal -->
    <div class="modal fade" id="exportModalCamp" tabindex="-1" role="dialog" aria-labelledby="exportModalCampLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?php echo e(route('admin.pendaftaran.camp.export')); ?>" method="GET">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Export Pendaftaran Camp</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="start_date">Dari Tanggal</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="end_date">Sampai Tanggal</label>
                            <input type="date" name="end_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Export</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Pendaftar</h3>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table id="pendaftarTable" class="table table-hover table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Kota</th>
                            <th>Program</th>
                            <th>Periode</th>
                            <th>Paket</th>
                            <th>Kamar</th>
                            <th>Status</th>
                            <th>Bank</th>
                            <th>Tipe Pembayaran</th>
                            <th>Bukti</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $pendaftar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                             <td><?php echo e($index + 1); ?></td>

                                <td><?php echo e($data->nama_lengkap); ?></td>
                                <td><?php echo e($data->gender); ?></td>
                                <td><?php echo e($data->email); ?></td>
                                <td><?php echo e($data->no_hp); ?></td>
                                <td><?php echo e($data->asal_kota); ?></td>
                                <td><?php echo e($data->programCamp->nama ?? '-'); ?></td>
                                <td><?php echo e($data->period?->date?->translatedFormat('d F Y') ?? '-'); ?></td>
                                <td><?php echo e($data->durasi_paket); ?></td>
                                <td><?php echo e($data->nama_kamar); ?></td>
                                <td>
                                    <?php
                                        $statusClass = match ($data->status) {
                                            'pending' => 'warning',
                                            'validasi' => 'info',
                                            'diterima' => 'success',
                                            'ditolak' => 'danger',
                                            default => 'secondary',
                                        };
                                    ?>
                                    <span class="badge badge-<?php echo e($statusClass); ?>"><?php echo e(ucfirst($data->status)); ?></span>
                                </td>
                                <td>
                                    <?php echo e($data->bank->name ?? '-'); ?>

                                </td>
                                <td>
                                    <?php if($data->payment_type === 'tunai'): ?>
                                        <span style="color: green; font-weight: bold;">Tunai</span>
                                    <?php elseif($data->payment_type === 'nontunai'): ?>
                                        <span style="color: blue; font-weight: bold;">Non Tunai</span>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <?php if($data->bukti_pembayaran): ?>
                                        <a href="<?php echo e(route('admin.pendaftaran.camp.bukti', $data->id)); ?>" target="_blank"
                                            title="Lihat Bukti">
                                            <img src="<?php echo e(asset('storage/' . $data->bukti_pembayaran)); ?>" alt="Bukti"
                                                class="img-thumbnail" style="max-width: 60px; height: auto;">
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted" style="font-size: 0.85em;">Belum ada</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                   <!-- Tombol Edit Status -->
    <div class="d-flex gap-1">
        <!-- Tombol Edit Status -->
        <button type="button" class="btn btn-primary btn-sm"
            data-toggle="modal"
            data-target="#statusModal<?php echo e($data->id); ?>"
            title="Edit Status"
            style="width: 38px; height: 38px;">
            <i class="fas fa-eye"></i>
        </button>


<!-- Modal Edit Status (Bootstrap 4) -->
<div class="modal fade" id="statusModal<?php echo e($data->id); ?>" tabindex="-1"
    aria-labelledby="statusModalLabel<?php echo e($data->id); ?>" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="<?php echo e(route('admin.pendaftaran.camp.update', $data->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel<?php echo e($data->id); ?>">
                        Ubah Status Pendaftaran
                    </h5>

                    <!-- FIX: close button Bootstrap 4 -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="pending" <?php echo e($data->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                            <option value="diterima" <?php echo e($data->status == 'diterima' ? 'selected' : ''); ?>>Diterima</option>
                            <option value="ditolak" <?php echo e($data->status == 'ditolak' ? 'selected' : ''); ?>>Ditolak</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <!-- FIX: Button Bootstrap 4 -->
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

                                        <!-- Delete Button -->
                                        <form action="<?php echo e(route('admin.pendaftaran.camp.destroy', $data->id)); ?>"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus pendaftaran ini?');">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus"
                                                style="width: 38px; height: 38px;">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>

                                
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="12" class="text-center py-4">Belum ada pendaftar.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

            </div>
            <div class="mt-3 d-flex justify-content-center">
                
            </div>
        </div>
    </div>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <style>
        .dataTables_filter {
            display: none;
        }

        .table-responsive {
            max-height: 450px;
        }

        .table-responsive::-webkit-scrollbar {
            height: 6px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background-color: #aaa;
            border-radius: 10px;
        }
        
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pendaftarTable').DataTable({
                paging: false,
                ordering: true,
                searching: true,
                info: false,
                responsive: true,
                columnDefs: [{
                    orderable: false,
                    targets: [0, 10, 11]
                }],
                language: {
                    search: "Cari:",
                    emptyTable: "Belum ada data yang tersedia.",
                    zeroRecords: "Tidak ditemukan data yang cocok."
                }
            });

            $('#searchInput').on('keyup', function() {
                $('#pendaftarTable').DataTable().search(this.value).draw();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389110718/domains/biepluskampunginggris.com/kampung_inggris_plus/resources/views/admin/camp/index.blade.php ENDPATH**/ ?>