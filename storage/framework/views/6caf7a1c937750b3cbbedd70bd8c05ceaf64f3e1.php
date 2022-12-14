
<?php $__env->startSection('content'); ?>
<br>
<div>
    <button type="button" class="btn btn-warning" onclick="location.href='<?php echo e(route('types.index')); ?>'">Back</a>
</div>

<br>

<h2>Type Data</h2>

    <div>
        <strong>Type name:</strong>
        <?php echo e($type->name); ?>

    </div>

    <div>
        <strong>Monsters:</strong>
        <?php $__currentLoopData = $type->monsters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monster): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($type->name == "Normal"): ?>
                <li><?php echo e($monster->monstername); ?></li>
                <img src="/img/show/undetermined.gif">
            <?php else: ?>
                <li><?php echo e($monster->monstername); ?></li>
                <img src="/img/show/<?php echo e($monster->id); ?>.gif" onerror="this.src='/img/show/undetermined.gif'">
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ricar\OneDrive\Escritorio\pokedex_laravel\resources\views/types/show.blade.php ENDPATH**/ ?>