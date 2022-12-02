

<?php $__env->startSection('content'); ?>
    <div>        
        <h2>Moves</h2>
    </div>
    <div>
        <button type="button" class="btn btn-info" onclick="location.href='<?php echo e(route('moves.create')); ?>'">New Move</a>
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
        
        <?php $__currentLoopData = $moves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $move): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <tr>
            <td><?php echo e($move->id); ?></td>
            <td><?php echo e($move->name); ?></td>     
            <td><?php echo e($move->description); ?></td>                           
            <td>     
                <button type="button" class="btn btn-primary" onclick="location.href='<?php echo e(route('moves.show',$move->id)); ?>'">Show</button> 
                  <?php if(Auth::user()->role=='admin'): ?>       
                  <button type="button" class="btn btn-success" onclick="location.href='<?php echo e(route('moves.edit',$move->id)); ?>'">Edit</button>
                  <button type="button" class="btn btn-danger" onclick="location.href='<?php echo e(route('moves.destroy',$move->id)); ?>">Delete</button>  
                  <?php endif; ?>             
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <?php echo e($moves->links('pagination::bootstrap-4')); ?>

      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\Desktop\DAW\M7\pokedex_laravel\resources\views/moves/index.blade.php ENDPATH**/ ?>