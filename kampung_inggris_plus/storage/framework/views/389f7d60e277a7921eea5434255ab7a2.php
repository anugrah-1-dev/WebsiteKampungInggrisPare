<?php $__env->startSection('title', 'Pendaftar Program Offline'); ?>

<?php $__env->startSection('content_header'); ?>
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 gap-2">
        <h1 class="m-0">Daftar Pendaftar Program Offline</h1>
        <div class="d-flex flex-column flex-md-row gap-2 align-items-center">
            <div class="input-group input-group-sm" style="width: 250px;">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari...">
                <span class="input-group-append">
                    <button type="button" class="btn btn-default btn-flat">
                        <i class="fas fa-search"></i>
                    </button>
                </span>
            </div>
            <button class="btn btn-success btn-sm ml-md-2" data-toggle="modal" data-target="#exportModal">
                <i class="fas fa-file-csv mr-1"></i> Export CSV
            </button>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show mb-4">
            <?php echo e(session('success')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Modal Export -->
    <div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?php echo e(route('admin.pendaftaran.offline.export')); ?>" method="GET">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exportModalLabel">Export Berdasarkan Tanggal & Program</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Dari Tanggal:</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Sampai Tanggal:</label>
                            <input type="date" name="end_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Pilih Program Bahasa:</label>
                            <select name="program_bahasa" class="form-control">
                                <option value="">Semua Program</option>
                                <?php $__currentLoopData = $programBahasa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bahasa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($bahasa); ?>"><?php echo e(ucfirst($bahasa)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Export</button>
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
                            <th width="5%">No</th>
                            <th>TRX ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Gender</th>
                            <th>Asal Kota</th>
                            <th>Program</th>
                            <th>Periode</th>
                            <th>Tipe Pembayaran</th>
                            <th>Bank Tujuan</th>
                            <th>Metode Pembayaran</th>
                            <th>Jumlah Pembayaran</th>
                            <th>Subtotal</th>
                            <th>Ukuran Seragam</th>
                            <th>Status</th>
                            <th>Bukti Pembayaran</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $pendaftar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($pendaftar->firstItem() + $key); ?></td>
                                <td><?php echo e($data->trx_id); ?></td>
                                <td><?php echo e($data->nama_lengkap); ?></td>
                                <td><?php echo e($data->email); ?></td>
                                <td><?php echo e($data->no_hp ?? '-'); ?></td>
                                <td><?php echo e($data->tempat_lahir ?? '-'); ?></td>
                                <td>
                                    <?php if($data->tanggal_lahir): ?>
                                        <?php echo e(\Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F
                                                                                                                                                                Y')); ?>

                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($data->gender ?? '-'); ?></td>
                                <td><?php echo e($data->asal_kota ?? '-'); ?></td>
                                <td><?php echo e($data->program->nama ?? '-'); ?></td>
                                <td>
                                    <?php if($data->program->program_bahasa === 'nhc' && $data->periodNHC): ?>
                                        <?php echo e(\Carbon\Carbon::parse($data->periodNHC->start_date)->translatedFormat('d F Y')); ?>

                                        -
                                        <?php echo e(\Carbon\Carbon::parse($data->periodNHC->end_date)->translatedFormat('d F Y')); ?>

                                    <?php else: ?>
                                        <?php echo e(optional($data->period?->date)->translatedFormat('d F Y') ?? '-'); ?>

                                    <?php endif; ?>
                                </td>
                                
                                <td>
                                    <?php if($data->payment_type == 'tunai'): ?>
                                        <span class="badge badge-success">Bayar Tunai</span>
                                    <?php elseif($data->payment_type == 'transfer'): ?>
                                        <span class="badge badge-info">Transfer Bank</span>
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>
                                
                                <td>
                                    <?php if($data->payment_type == 'transfer'): ?>
                                        <?php echo e($data->bank->name ?? '-'); ?>

                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>
                                
                                <td>
                                    <?php if($data->payment_method === 'DP'): ?>
                                        <span class="badge bg-warning text-dark">DP</span>
                                    <?php elseif($data->payment_method === 'cicilan'): ?>
                                        <span class="badge bg-info text-dark">Cicilan</span>
                                    <?php else: ?>
                                        <span class="badge bg-success">Full</span>
                                    <?php endif; ?>
                                </td>

                                
                                <td>
                                    <?php if($data->payment_method === 'DP'): ?>
                                        
                                        Rp <?php echo e(number_format($data->dp_amount, 0, ',', '.')); ?>

                                    <?php elseif($data->payment_method === 'cicilan'): ?>
                                        
                                        Rp <?php echo e(number_format($data->jumlah_cicilan_terbayar ?? 0, 0, ',', '.')); ?>

                                    <?php else: ?>
                                        Rp <?php echo e(number_format($data->subtotal, 0, ',', '.')); ?>

                                    <?php endif; ?>
                                </td>
                                
                                <td>
                                    <?php if($data->subtotal): ?>
                                        Rp.<?php echo e(number_format($data->subtotal, 0, ',', '.')); ?>

                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>
                                
                                <td>
                                    <?php if($data->ukuran_seragam): ?>
                                        <i class="fas fa-shirt text-primary"></i>
                                        <?php echo e(strtoupper($data->ukuran_seragam)); ?>

                                    <?php else: ?>
                                        <span class="text-muted" style="font-size: 0.85em;">Belum dipilih</span>
                                    <?php endif; ?>
                                </td>


                                
                                <td>
                                    <?php
                                        $statusClass = 'secondary';
                                        if ($data->status === 'pending') {
                                            $statusClass = 'warning';
                                        }
                                        if ($data->status === 'diterima') {
                                            $statusClass = 'success';
                                        }
                                        if ($data->status === 'ditolak') {
                                            $statusClass = 'danger';
                                        }
                                    ?>
                                    <span class="badge badge-<?php echo e($statusClass); ?>"><?php echo e(ucfirst($data->status)); ?></span>
                                </td>

                                
                                <td>
                                    <?php if($data->bukti_pembayaran): ?>
                                        <a href="<?php echo e(asset('storage/' . $data->bukti_pembayaran)); ?>" target="_blank"
                                            title="Lihat Bukti">
                                            <img src="<?php echo e(asset('storage/' . $data->bukti_pembayaran)); ?>" alt="Bukti"
                                                class="img-thumbnail" style="max-width: 60px; height: auto;">
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted" style="font-size: 0.85em;">Belum ada</span>
                                    <?php endif; ?>
                                </td>

                                
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?php echo e(route('admin.pendaftaran.offline.edit', $data->id)); ?>"
                                            class="btn btn-primary btn-action" title="Edit Status">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <?php if($data->payment_method === 'cicilan'): ?>
                                            <a href="<?php echo e(route('admin.pendaftaran.offline.show', $data->id)); ?>"
                                                class="btn btn-info btn-action" title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        <?php endif; ?>
                                        <form action="<?php echo e(route('admin.pendaftaran.offline.destroy', $data->id)); ?>"
                                            method="POST"
                                            onsubmit="return confirm('Anda yakin ingin menghapus pendaftaran ini secara permanen?');"
                                            class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-action" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="13" class="text-center py-4">Belum ada pendaftar.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php if($pendaftar->hasPages()): ?>
            <div class="card-footer bg-light">
                <?php echo e($pendaftar->links('vendor.pagination.bootstrap-4')); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <style>
        .dataTables_filter {
            display: none;
        }

        .table-responsive {
            min-height: 450px;
            /* TINGGI MINIMAL agar tabel tampak penuh */
            max-height: 450px;
            /* tetap boleh scroll kalau data banyak */
            overflow-y: auto;
            overflow-x: auto;
        }

        .table-placeholder {
            height: 100px;
            text-align: center;
            vertical-align: middle;
            color: #aaa;
            font-style: italic;
        }



        .table-responsive::-webkit-scrollbar {
            height: 6px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background-color: #aaa;
            border-radius: 10px;
        }

        .btn-group-sm .btn {
            padding: 0.25rem 0.5rem;
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
                    // PERUBAHAN: Menyesuaikan target kolom yang tidak bisa di-sort
                    targets: [0, 9, 10]
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389110718/domains/biepluskampunginggris.com/kampung_inggris_plus/resources/views/admin/pendaftaran_offline/index.blade.php ENDPATH**/ ?>