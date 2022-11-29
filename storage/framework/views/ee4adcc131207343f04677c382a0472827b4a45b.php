<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('moves.index')); ?>">Back</a>

<h2>Move</h2>
       
<div>
<strong>Name:</strong>
<?php echo e($move->name); ?>

</div>

<div>
<strong>Description:</strong>
<?php echo e($move->description); ?>

</div>
        

<div>
<strong>Monsters learning this move:</strong>
<ul>
   <?php $__currentLoopData = $move->monsters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monster): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     	<li>
            <?php echo e($monster->monstername); ?> 
            </li>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/pokedex_laravel/resources/views/moves/show.blade.php ENDPATH**/ ?>