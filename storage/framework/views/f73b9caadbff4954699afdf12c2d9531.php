

<?php $__env->startSection('content'); ?>

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Cita #<?php echo e($appointments->id); ?></h3>
            </div>
            <div class="col text-right">
              <a href="<?php echo e(url ('/miscitas')); ?>" class="btn btn-sm btn-success">
              <i class="fas fa-arrow-left"></i>    
                Regresar</a>
            </div>
          </div>
        </div>
      <div class="card-body">
        <ul>
            <dd>
                <strong>Fecha:</strong><?php echo e($appointments->scheduled_date); ?>

            </dd>
            <dd>
                <strong>Hora de atención:</strong><?php echo e($appointments->scheduled_time_12); ?>

            </dd>
            <?php if($role == 'usuarios' || $role == 'admin'): ?>
            <dd>
                <strong>Empleado:</strong><?php echo e($appointments->nombre_e); ?>

            </dd>
            <?php elseif($role == 'empleados' || $role == 'admin'): ?>
            <dd>
                <strong>Usuario:</strong><?php echo e($appointments->usuario->name); ?>

            </dd>
            <?php endif; ?>
            <dd>
                <strong>Actividad:</strong><?php echo e($appointments->actividades->name); ?>

            </dd>
            <dd>
                <strong>Tipo de actividad:</strong><?php echo e($appointments->type); ?>

            </dd>
            <dd>
                <strong>Estado:</strong>
                <?php if($appointments->status == 'Cancelada'): ?>
                <span class="badge badge-danger">Cancelada</span>
                <?php else: ?>
                <span class="badge badge-primary"><?php echo e($appointments->status); ?></span>
                <?php endif; ?>
            </dd>
            <dd>
                <strong>Desccripción:</strong><?php echo e($appointments->description); ?>

            </dd>
            </ul>

            <?php if($appointments->status == 'Cancelada'): ?>
            <div class="alert bg-light text-primary">
                <h3>Detalles de la cancelación</h3>
                <?php if($appointments->cancellation): ?>
                <ul>
                    <li>
                        <strong>Fecha de cancelación:</strong>
                        <?php echo e($appointments->cancellation->created_at); ?>

                    </li>
                    <li>
                        <strong>La cita fue cancelada por:</strong>
                        <?php echo e($appointments->cancellation->cancelled_by->name); ?>

                    </li>
                    <li>
                        <strong>Motivo de la cancelación:</strong>
                        <?php echo e($appointments->cancellation->justification); ?>

                    </li>
                </ul>
                <?php else: ?>
                <ul>
                    <li>La cita fue cancelada antes de su confirmación.</li>
                </ul>
                <?php endif; ?>
            </div>
            <?php endif; ?>
      </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\CAM\resources\views/appointments/show.blade.php ENDPATH**/ ?>