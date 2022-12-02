

<?php $__env->startSection('content'); ?>
    <div>        
        <h2>Types</h2>
    </div>
    <div>
        <button type="button" class="btn btn-info" onclick="location.href='<?php echo e(route('types.create')); ?>'">New Type</a>
    </div>
        
   
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e(session('success')); ?></p>
        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

       
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>                        
                <th>Operations</th>
            </tr>
        </thead>
        
        <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <tr>
            <td><?php echo e($type->id); ?></td>
            <td><?php echo e($type->name); ?></td>
            <td><?php echo e($type->description); ?></td>                     
            <td>  
                <div class="d-flex">   
                  <button type="button" class="btn btn-primary m-2" onclick="location.href='<?php echo e(route('types.show',$type->id)); ?>'">Show</button> 
                  <?php if(Auth::user()->role=='admin'): ?>       
                  <button type="button" class="btn btn-success m-2" onclick="location.href='<?php echo e(route('types.edit',$type->id)); ?>'">Edit</button>
                  <button type="button" class="btn btn-danger m-2" onclick="location.href='<?php echo e(route('types.destroy',$type->id)); ?>'">Delete</button>    
                  <?php endif; ?>  
                </div>         
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  
    <?php echo e($types->links('pagination::bootstrap-4')); ?>

      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\Desktop\DAW\M7\pokedex_laravel\resources\views/types/index.blade.php ENDPATH**/ ?>