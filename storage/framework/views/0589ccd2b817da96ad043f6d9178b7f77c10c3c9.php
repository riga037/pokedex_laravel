<?php $__env->startSection('content'); ?>

<br>

<div>
    <button type="button" class="btn btn-warning" onclick="location.href='<?php echo e(route('types.index')); ?>'">Back</button>
</div>

<br>

<div>
    <h2>Add New Type</h2>
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
<form action="<?php echo e(route('types.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
  
    <div>
        <strong>Type Name:</strong>
        <input type="text" name="name" value="<?php echo e(old('name')); ?>">
    </div>
    <br>
    <div>           
        <strong>Description:</strong>
        <input type="text" name="description" value="<?php echo e(old('description')); ?>">
    </div>
    <br>
    <div>
        <input type="submit" value="Save" class="btn btn-dark">
    </div>
    
</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/pokedex_laravel/resources/views/types/new.blade.php ENDPATH**/ ?>