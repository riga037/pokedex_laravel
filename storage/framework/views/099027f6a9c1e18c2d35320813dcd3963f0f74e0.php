  
<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('types.index')); ?>">Back</a>

<h2>Type Data</h2>

    <div>
        <strong>Type name:</strong>
        <?php echo e($type->name); ?>

    </div>

    <div>
        <strong>Monsters:</strong>
        <?php $__currentLoopData = $type->monsters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monster): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($monster->monstername); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/pokedex_laravel/resources/views/types/show.blade.php ENDPATH**/ ?>