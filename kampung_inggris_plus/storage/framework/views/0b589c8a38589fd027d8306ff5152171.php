<link rel="stylesheet" href="<?php echo e(asset('css/wa.css')); ?>">

<?php if(isset($contactServices) && count($contactServices)): ?>
    <div class="wa-sticky-wrapper">
        <div class="wa-circle-row">
            <?php $__currentLoopData = $contactServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                <?php
                    $pesan = urlencode('Halo, saya ingin bertanya seputar program di Brilliant English Course.');
                ?>

                <a href="https://wa.me/62<?php echo e($contact->nomor); ?>?text=<?php echo e($pesan); ?>" class="wa-circle tooltip"
                    target="_blank">
                    <img src="<?php echo e(asset('asset/wa/WhatsApp.svg')); ?>" alt="WA">
                    <span class="tooltip-text"><?php echo e($contact->nama); ?></span>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>

<script>
    // Tooltip effect
    document.querySelectorAll('.wa-circle.tooltip').forEach(function(el) {
        el.addEventListener('mouseenter', function() {
            const tooltip = el.querySelector('.tooltip-text');
            tooltip.style.visibility = 'visible';
            tooltip.style.opacity = '1';
        });
        el.addEventListener('mouseleave', function() {
            const tooltip = el.querySelector('.tooltip-text');
            tooltip.style.visibility = 'hidden';
            tooltip.style.opacity = '0';
        });
    });
</script>
<?php /**PATH /home/u389110718/domains/biepluskampunginggris.com/kampung_inggris_plus/resources/views/partials/whatsapp-floating.blade.php ENDPATH**/ ?>