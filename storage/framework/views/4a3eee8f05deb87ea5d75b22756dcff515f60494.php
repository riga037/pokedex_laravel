
<?php $__env->startSection('content'); ?>
    <br>
    <div>        
        <h2>Monsters</h2>
    </div>
    <div>
        <button type="button" class="btn btn-info" onclick="location.href='<?php echo e(route('monsters.create')); ?>'">New Monster</button>
    </div>
    <div>
        
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

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php $__currentLoopData = $monsters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monster): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col">
            <div class="card h-100">
                <?php if($monster->type_id==1): ?>
                <img src="/img/<?php echo e($monster->id); ?>.gif" onerror="this.src='/img/undetermined.gif'"  class="card-img-top" style="margin:auto; padding: 2em; height:50%; width:100%; background: radial-gradient(circle, rgba(228,255,177,1) 0%, rgba(7,255,0,1) 96%);">
                <?php elseif($monster->type_id==2): ?>
                <img src="/img/<?php echo e($monster->id); ?>.gif" onerror="this.src='/img/undetermined.gif'" class="card-img-top" style="margin:auto; padding: 2em; height:50%; width:100%; background: radial-gradient(circle, rgba(255,177,177,1) 0%, rgba(255,0,0,1) 96%);">
                <?php elseif($monster->type_id==3): ?>
                <img src="/img/<?php echo e($monster->id); ?>.gif" onerror="this.src='/img/undetermined.gif'" class="card-img-top" style="margin:auto; padding: 2em; height:50%; width:100%; background:radial-gradient(circle, rgba(177,207,255,1) 0%, rgba(99,159,231,1) 96%);">
                <?php else: ?>
                <img src="/img/<?php echo e($monster->id); ?>.gif" onerror="this.src='/img/undetermined.gif'" class="card-img-top" style="margin:auto; padding: 2em; height:50%; width:100%; background: radial-gradient(circle, rgba(255,255,255,1) 0%, rgba(135,135,135,1) 100%);">
                <?php endif; ?>
                <div class="card-body">
                    <h5 class="card-title"><strong>#<?php echo e($monster->id); ?> <?php echo e($monster->monstername); ?></strong></h5>
                    <p class="card-text"><strong>Type:</strong> <?php echo e($monster->type->name); ?></p>
                    <p class="card-text"><strong>Category:</strong> <?php echo e($monster->category); ?></p>
                    <h6><strong>Description:</strong></h6>
                    <p class="card-text"><?php echo e($monster->description); ?></p>
                    <h6><strong>Moves:</strong></h6>
                    <p class="card-text">
                    <ul>
                        <?php $__currentLoopData = $monster->moves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $move): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                            <?php echo e($move->name); ?> 
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    </p>
                    <?php if(Auth::user()->role=='admin'): ?> 
                    <h6><strong>Options:</strong></h6>
                    <button type="button" class="btn btn-primary" onclick="location.href='<?php echo e(route('monsters.editmoves',$monster->id)); ?>'">Moves</button>
                    <button type="button" class="btn btn-success" onclick="location.href='<?php echo e(route('monsters.edit',$monster->id)); ?>'">Edit</button>
                    <button type="button" class="btn btn-danger" onclick="location.href='<?php echo e(route('monsters.destroy',$monster->id)); ?>'">Delete</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <br>

    <?php echo e($monsters->links('pagination::bootstrap-4')); ?>

      
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ricar\OneDrive\Escritorio\pokedex_laravel\resources\views/monsters/index.blade.php ENDPATH**/ ?>