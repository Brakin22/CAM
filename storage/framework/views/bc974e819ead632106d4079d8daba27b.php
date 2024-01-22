<?php
use Illuminate\Support\Str;
?>



<?php $__env->startSection('content'); ?>

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Editar Perfil</h3>
            </div>
            
          </div>
        </div>
       
    <div class="card-body">

        <?php if($errors->any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger" role="alert">
            <i class="fas fa-exclamation-triangle"></i>
                <strong>Por favor!</strong> <?php echo e($error); ?>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        <?php endif; ?>

        <?php if(session('notification')): ?>
        
        <div class="alert alert-success" role="alert">
        <?php echo e(session('notification')); ?>

        </div>
        
        
    <?php endif; ?>

        <form action="<?php echo e(url('/profile')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            
            <div class="form-group">
                <label for="name">Nombre completo</label>
                <input name="name" id="name" 
                value="<?php echo e(old('name', $user->name)); ?>"
                type="text" class="form-control"
                required></input>
            </div>
            <div class="form-group">
                <label for="phone">Número de Teléfono</label>
                <input name="phone" id="phone" 
                value="<?php echo e(old('phone', $user->phone)); ?>"
                type="text" class="form-control"
                required></input>
            </div>

            <div class="form-group">
                <label for="address">Dirección de domicilio</label>
                <input name="address" id="address" 
                value="<?php echo e(old('address', $user->address)); ?>"
                type="text" class="form-control"
                required></input>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Guardar Cambios</button>
        </form>
    </div>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Version_nueva_Laravel\Version_03\CAM\resources\views/profile.blade.php ENDPATH**/ ?>