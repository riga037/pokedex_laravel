  
<?php $__env->startSection('content'); ?>
<div class="float-right">
    <a href="<?php echo e(route('monsters.index')); ?>">Back</a>
</div>
<h2>Monster Data</h2>
              
<div>
        
    <div>
        <strong>Monster Name:</strong>
        <?php echo e($monster->monstername); ?>

    </div>
        
    <div>            
       <strong>Category:</strong>
       <?php echo e($monster->category); ?>

    </div>
    <div>
        <strong>Description:</strong>
        <?php echo e($monster->description); ?>

    </div>
        
    <div>
        <strong>Type:</strong>
        <?php echo e($monster->type->name); ?>

    </div>
        
    <div>
        <strong>Moves:</strong>
        <ul>
        <?php $__currentLoopData = $monster->moves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $move): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
            <?php echo e($move->name); ?> 
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/pokedex_laravel/resources/views/monsters/show.blade.php ENDPATH**/ ?>