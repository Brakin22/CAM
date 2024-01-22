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

        <form action="<?php echo e(url('/reservarcitas')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="actividades">Actividad</label>
                <select name="actividades_id" id="actividades" class="form-control">
                <option value="">Seleccionar actividad</option>
                <?php $__currentLoopData = $actividades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activida): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($activida->id); ?>"
                    <?php if(old('actividades_id') == $activida->id): ?> selected <?php endif; ?>>
                    <?php echo e($activida->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>    
            </div>

            <div class="form-group col-md-6">
                <label for="empleados">Empleado</label>
                <select name="empleadu_id" id="empleados" class="form-control" required>
                <?php $__currentLoopData = $emplead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empleados): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($empleados->id); ?>"
                    <?php if(old('empleadu_id') == $empleados->id): ?> selected <?php endif; ?>>
                    <?php echo e($empleados->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>    
            </div>
            </div>


            <div class="form-group">
                <label for="date">Fecha</label>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input class="form-control datepicker" 
                    id="date" name="scheduled_date"
                    placeholder="Seleccionar fecha" 
                    type="date" value="<?php echo e(old('scheduled_date'), date('Y-m-d')); ?>" 
                    data-date-format="yyyy-mm-dd"
                    data-date-start-date="<?php echo e(date('Y-m-d')); ?>" 
                    data-date-end-date="+30d">
                </div>
            </div>

            <div class="form-group">
                <label for="hours">Hora de atención</label>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h4 class="m-3" id="titleMorning"></h4>
                            <div id="hoursMorning">
                                <?php if($intervals): ?>
                                <h4 class="m-3"> En la mañana</h4>
                                    <?php $__currentLoopData = $intervals['morning']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $interval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="custom-control custom-radio mb-3">
                                    <input type="radio" id="intervalMorning<?php echo e($key); ?>" name="scheduled_time" value="<?php echo e(interval['start']); ?>" class="custom-control-input">
                                    <label class="custom-control-label" for="intervalMorning<?php echo e($key); ?>"><?php echo e(interval['start']); ?> - <?php echo e(interval['end']); ?></label>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <mark>
                                    <small class="text-warning display-5">
                                        Selecciona un empleado y una fecha, para ver el horario y las horas disponibles.
                                    </small>
                                </mark>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col">
                            <h4 class="m-3" id="titleAfternoon"></h4>
                            <div id="hoursAfternoon">
                            <?php if($intervals): ?>
                                <h4 class="m-3"> En la tarde</h4>
                                    <?php $__currentLoopData = $intervals['afternoon']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $interval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="custom-control custom-radio mb-3">
                                    <input type="radio" id="intervalAfternoon<?php echo e($key); ?>" name="scheduled_time" value="<?php echo e(interval['start']); ?>" class="custom-control-input">
                                    <label class="custom-control-label" for="intervalAfternoon<?php echo e($key); ?>"><?php echo e(interval['start']); ?> - <?php echo e(interval['end']); ?></label>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                    </div> 
                </div>
            </div>

            <div class="form-group">
                <label>Tipo de actividad</label>
                <div class="custom-control custom-radio mt-3 mb-3">
                <input type="radio" id="type1" name="type" class="custom-control-input" 
                <?php if(old('type') == 'Ludica'): ?> checked <?php endif; ?> value="Ludica">
                <label class="custom-control-label" for="type1">Ludica</label>
            </div>
            <div class="custom-control custom-radio mt-3 mb-3">
                <input type="radio" id="type2" name="type" class="custom-control-input" 
                <?php if(old('type') == 'Comercialización'): ?> checked <?php endif; ?> value="Comercialización">
                <label class="custom-control-label" for="type2">Comercialización</label>
            </div>
            <div class="custom-control custom-radio mt-3 mb-5">
                <input type="radio" id="type3" name="type" class="custom-control-input" 
                <?php if(old('type') == 'Emergencias'): ?> checked <?php endif; ?> value="Emergencias">
                <label class="custom-control-label" for="type3">Emergencias</label>
            </div>
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" type="text" class="form-control" rows="5"
                rows="5" placeholder="Descripción breve de la actividad..." required class="form-c"></textarea>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </form>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script src="<?php echo e(asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('/js/appointments/create.js')); ?>">
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\CAM\resources\views/appointments/create.blade.php ENDPATH**/ ?>