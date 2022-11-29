<?php $__env->startSection('content'); ?>
    <div>        
        <h2>Monsters</h2>
    </div>
    <div>
        <a href="<?php echo e(route('monsters.create')); ?>">New Monster</a>
    </div>
        
    <br>
   
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

       
    <!-- <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Monster Name</th>
                <th>Category</th>                        
                <th>Description</th>
                <th>Operations</th>
            </tr>
        </thead>
        
        <?php $__currentLoopData = $monsters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monster): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <tr>
            <td><?php echo e($monster->id); ?></td>
            <td><?php echo e($monster->monstername); ?></td>
            <td><?php echo e($monster->category); ?></td>
            <td><?php echo e($monster->description); ?></td>                      
            <td>
                <a href="<?php echo e(route('monsters.show',$monster->id)); ?>">Show</a> 
                <?php if(Auth::user()->role=='admin'): ?>       
                <a href="<?php echo e(route('monsters.editmoves',$monster->id)); ?>">Moves</a>       
                <a href="<?php echo e(route('monsters.edit',$monster->id)); ?>">Edit</a>
                <a href="<?php echo e(route('monsters.destroy',$monster->id)); ?>">Delete</a>
                <?php endif; ?>               
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  
    <?php echo e($monsters->links('pagination::bootstrap-4')); ?> -->

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php $__currentLoopData = $monsters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monster): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col">
            <div class="card h-100">
            <img src="https://raw.githubusercontent.com/riga037/pokedex_laravel/main/img/<?php echo e($monster->id); ?>.gif" class="card-img-top" style="width:50%; margin:auto">
            <div class="card-body">
                <h5 class="card-title">#<?php echo e($monster->id); ?> <?php echo e($monster->monstername); ?></h5>
                <p class="card-text"><?php echo e($monster->category); ?></p>
                <p class="card-text"><?php echo e($monster->description); ?></p>
            </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <br>

    <?php echo e($monsters->links('pagination::bootstrap-4')); ?>

      
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/pokedex_laravel/resources/views/monsters/index.blade.php ENDPATH**/ ?>