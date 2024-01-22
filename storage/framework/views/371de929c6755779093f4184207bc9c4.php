<div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Actividad</th>
                <th scope="col">Fecha</th>
                <th scope="col">Estado</th>
                <th scope="col">Opciones</th>

              </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $oldAppointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>
                    <?php echo e($cita->actividades->name); ?>

                </td>
                <td>
                    <?php echo e($cita->scheduled_date); ?>

                </td>
                <td>
                    <?php echo e($cita->status); ?>

                </td>
                <td>
                  
                <a href="<?php echo e(url('/miscitas/'.$cita->id)); ?>" class="btn btn-info btn-sm">
                  Ver
                </a>
                    
                </td>
                
              </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div><?php /**PATH C:\laragon\www\CAM\resources\views/appointments/old-appointments.blade.php ENDPATH**/ ?>