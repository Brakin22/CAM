

<?php $__env->startSection('content'); ?>

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Cancelar Cita</h3>
            </div>
            <div class="col text-right">
              <a href="<?php echo e(url ('/miscitas')); ?>" class="btn btn-sm btn-success">
              <i class="fas fa-arrow-left"></i>    
                Regresar</a>
            </div>
          </div>
        </div>
      <div class="card-body">
        <?php if(session ('notification')): ?>
        <div class="alert alert-success" role="alert">
              <?php echo e(session ('notification')); ?>

      </div>
        <?php endif; ?>

        <?php if($role == 'usuarios'): ?>
        <p>Se cancelara tú cita reservada con el empleado <b><?php echo e($appointments->nombre_e); ?></b>
            (actividad) <b><?php echo e($appointments->actividades->name); ?></b>
            para el dia <b><?php echo e($appointments->scheduled_date); ?></b>.</p>
        <?php elseif($role == 'empleados'): ?>
        <p>Se cancelara tú cita reservada con el usuario <b><?php echo e($appointments->usuario->name); ?></b>
            (actividad) <b><?php echo e($appointments->actividades->name); ?></b>
            para el dia <b><?php echo e($appointments->scheduled_date); ?></b>
            para en la hora <b><?php echo e($appointments->scheduled_time_12); ?></b>.
          </p>
            <?php else: ?>
            Se cancelara tú cita reservada con el usuario <b><?php echo e($appointments->usuario->name); ?></b>
            que sera atendido por el Empleado <b><?php echo e($appointments->nombre_e); ?></b>
            (actividad) <b><?php echo e($appointments->actividades->name); ?></b>
            para el dia <b><?php echo e($appointments->scheduled_date); ?></b>
            para el dia <b><?php echo e($appointments->scheduled_time_12); ?></b>.
          </p>
          <?php endif; ?>
            <form action="<?php echo e(url('/miscitas/'.$appointments->id.'/cancel')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="justification">Ponga los motivos de la cancelación:</label>
                    <textarea name="justification" id="justification" rows="3" class="form-control" required></textarea>
                </div>
                
                <button class="btn btn-danger" type="submit">Cancelar cita</button>
            </form>
      </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\CAM\resources\views/appointments/cancel.blade.php ENDPATH**/ ?>