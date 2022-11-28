   
<?php $__env->startSection('content'); ?>
<div>
    <a href="<?php echo e(route('monsters.index')); ?>">Back</a>
</div>
<div>    
    <h2>Moves of <?php echo e($monster->monstername); ?></h2>
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


<div class="row">

    <div class="col-sm">
     	<form method='POST' action="<?php echo e(route('monsters.detachmoves',$monster->id)); ?>">
            <?php echo csrf_field(); ?>
	     	<div class="form-group">
	    	  <label>Assigned Moves</label>
	    	  <select multiple  size="10" name="moves[]" class="form-control">
	    			
	    		<?php $__currentLoopData = $monster->moves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $move): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> {		
	                  <option value="<?php echo e($move->id); ?>">
                            <?php echo e($move->name); ?>                              
                          </option>                         
	                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    			
	    	</select>
	    	</div>
	    	<input type="submit" value="Discard Moves" class="btn btn-dark">
    	</form>

    </div>
    <div class="col-sm">
    	<form method='POST' action="<?php echo e(route('monsters.assignmoves',$monster->id)); ?>">
             <?php echo csrf_field(); ?>
      		<div class="form-group">
    		<label>Moves List</label>
    		<select multiple class="form-control" size="20" name="moves[]">
          
    		  <?php $__currentLoopData = $moves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $move): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> {        
                    <option value="<?php echo e($move->id); ?>">
                      <?php echo e($move->name); ?>                              
                    </option>                         
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    		</select>
    		
    		</div>
    		<input class="btn btn-dark" value="Assign Moves" type="submit">
    	</form>
    </div>
    
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/pokedex_laravel/resources/views/monsters/showMoves.blade.php ENDPATH**/ ?>