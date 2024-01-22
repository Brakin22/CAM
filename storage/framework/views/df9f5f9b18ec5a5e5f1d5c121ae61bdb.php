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
              <h3 class="mb-0">Editar empleado</h3>
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

        <form action="<?php echo e(url('/empleados/'.$empleados->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="name">Nombre del empleado</label>
                <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $empleados->name)); ?>">
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
                <input type="text" name="email" class="form-control" value="<?php echo e(old('email', $empleados->email)); ?>">
            </div>

            <div class="form-group">
                <label for="cedula">Cédula</label>
                <input type="text" name="cedula" class="form-control" value="<?php echo e(old('cedula', $empleados->cedula)); ?>">
            </div>

            <div class="form-group">
                <label for="address">Dirección</label>
                <input type="text" name="address" class="form-control" value="<?php echo e(old('address', $empleados->address)); ?>">
            </div>

            <div class="form-group">
                <label for="phone">Telefono / Móvil</label>
                <input type="text" name="phone" class="form-control" value="<?php echo e(old('phone', $empleados->phone)); ?>">
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="text" name="password" class="form-control">
                <small class="text-warning">Solo llena el campo si desea cambiar la contraseña</small>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Guardar cambios</button>
        </form>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script>
    $(document).ready(()=> {});
    $('#actividades').selectpicker('val', <?php echo json_encode($activi_ids, 15, 512) ?> );
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Version_nueva_Laravel\Version_03\CAM\resources\views/empleados/edit.blade.php ENDPATH**/ ?>