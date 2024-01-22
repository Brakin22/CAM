<?php
    use Illuminate\Support\Str;
?>


<?php $__env->startSection('styles'); ?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Nuevo empleado</h3>
            </div>
            <div class="col text-right">
              <a href="<?php echo e(url ('/empleados')); ?>" class="btn btn-sm btn-success">
              <i class="fas fa-arrow-left"></i>    
                Regresar</a>
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

        <form action="<?php echo e(url('/empleados')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="name">Nombre del empleado</label>
                <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>" required>
            </div>

            <div class="form-group">
                <label for="actividades">Actividades</label>
                <select name="actividades[]" id="actividades" class="form-control selectpicker"
                data-style="btn-primary" title="Seleccionar actividades" multiple required>
                <?php $__currentLoopData = $actividades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activida): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($activida->id); ?>"><?php echo e($activida->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="text" name="email" class="form-control" value="<?php echo e(old('email')); ?>">
            </div>

            <div class="form-group">
                <label for="cedula">Cédula</label>
                <input type="text" name="cedula" class="form-control" value="<?php echo e(old('cedula')); ?>">
            </div>

            <div class="form-group">
                <label for="address">Dirección</label>
                <input type="text" name="address" class="form-control" value="<?php echo e(old('address')); ?>">
            </div>

            <div class="form-group">
                <label for="phone">Telefono / Móvil</label>
                <input type="text" name="phone" class="form-control" value="<?php echo e(old('phone')); ?>">
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="text" name="password" class="form-control" value="<?php echo e(old('password',Str::random(8))); ?>">
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Crear empleado</button>
        </form>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\CAM\resources\views/empleados/create.blade.php ENDPATH**/ ?>