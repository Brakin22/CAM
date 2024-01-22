<?php
use Illuminate\Support\Str;
?>



<?php $__env->startSection('content'); ?>

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Registrar nueva cita</h3>
            </div>
            <div class="col text-right">
              <a href="<?php echo e(url ('/usuarios')); ?>" class="btn btn-sm btn-success">
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

        <form action="<?php echo e(url('/usuarios')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="activvidades">Actividad</label>
                <select name="actividades_id" id="actividades" class="form-control">
                    <option value="">Seleccionar actividad</option>
                <?php $__currentLoopData = $actividades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activida): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($activida->id); ?>"><?php echo e($activida->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>    
            </div>

            <div class="form-group">
                <label for="empleados">Empleado</label>
                <select name="empleadu_id" id="empleados" class="form-control">
                
                </select>    
            </div>

            <div class="form-group">
                <label for="cedula">Fecha</label>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input class="form-control datepicker" placeholder="Seleccionar fecha" 
                    type="text" value="<?php echo e(date('Y-m-d')); ?>" data-date-format="yyyy-mm-dd"
                    data-date-start-date="<?php echo e(date('Y-m-d')); ?>" data-date-end-date="+30d">
                </div>
            </div>

            <div class="form-group">
                <label for="address">Hora de atención</label>
                <input type="text" name="address" class="form-control" value="<?php echo e(old('address')); ?>">
            </div>

            <div class="form-group">
                <label for="phone">Tipo de actividad</label>
                <input type="text" name="phone" class="form-control" value="<?php echo e(old('phone')); ?>">
            </div>

            
            <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </form>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script src="<?php echo e(asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
<script>
    let $empleados;
    $(function(){
        const $activi = $('#actividades');
        $empleados = $('#empleados');
        $activi.change(() => {
            const actividId =$activi.val();
            const url =`/actividades/${actividId}/empleados`;
            $.getJSON(url, onEmpleadLoaded);
        });
    });
    function onEmpleadLoaded (emplead){
        let htmlOption = '';
        emplead.forEach(empleados =>{;
        htmlOption += `<option value="${empleados.id}">${empleados.name}</option>`;
        });
        $empleados.html(htmlOption);
    }

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Version_nueva_Laravel\CAM\resources\views/appointments/create.blade.php ENDPATH**/ ?>