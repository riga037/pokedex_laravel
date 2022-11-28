  
<?php $__env->startSection('content'); ?>
<div>
    <a href="<?php echo e(route('monsters.index')); ?>">Back</a>
</div>
<div>
    <h2>Add New Monster</h2>
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
<form action="<?php echo e(route('monsters.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
  
    <div>
        <strong>Monster Name:</strong>
        <input type="text" name="monstername" value="<?php echo e(old('monstername')); ?>">
    </div>
        
    <div>           
        <strong>Category:</strong>
        <input type="text" name="category" value="<?php echo e(old('category')); ?>">
    </div>

    <div>           
        <strong>Description:</strong>
        <input type="text" name="description" value="<?php echo e(old('description')); ?>">
    </div>
        
    <div>           
        <strong>Type:</strong>
        <select name="type_id">
            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($type->id); ?>" <?php echo e(old('type_id') == $type->id ? 'selected' : ''); ?> >
                            <?php echo e($type->name); ?>

                        </option>       
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
        </select>
    </div>
        
        
    <div>
        <input type="submit" value="Save">
    </div>
    
</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/pokedex_laravel/resources/views/monsters/new.blade.php ENDPATH**/ ?>