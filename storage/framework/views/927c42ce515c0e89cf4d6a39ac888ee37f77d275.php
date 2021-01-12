<?php if(session('success')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>


<?php if(session('warning')): ?>
    <div class="alert alert-warning" role="alert">
        <?php echo e(session('warning')); ?>

    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>


<?php /**PATH /opt/lampp/htdocs/Role/resources/views/partials/alerts.blade.php ENDPATH**/ ?>