<?php $__env->startSection('content'); ?>
<div>
    <a href="<?php echo e(route('moves.index')); ?>">Back</a>
</div>
<div>
    <h2>Add New Move</h2>
</div>
    
   
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
   
<div>
<form action="<?php echo e(route('moves.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
  
    <div>
        <strong>Move Name:</strong>
        <input type="text" name="name" value="<?php echo e(old('name')); ?>">
    </div>

    <div>           
        <strong>Description:</strong>
        <input type="text" name="description" value="<?php echo e(old('description')); ?>">
    </div>
 
    <div>
        <input type="submit" value="Save">
    </div>
    
</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/pokedex_laravel/resources/views/moves/new.blade.php ENDPATH**/ ?>