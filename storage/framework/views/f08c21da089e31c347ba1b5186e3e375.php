<div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Descripción</th>
                <th scope="col">Actividad</th>
                <?php if($role == 'usuarios'): ?>
                <th scope="col">Empledo</th>
                <?php elseif($role == 'empleados'): ?>
                <th scope="col">Usuario</th>
                <?php endif; ?>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Tipo</th>
                <th scope="col">Opciones</th>

              </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $pendingAppointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <th scope="row">
                  <?php echo e($cita->description); ?>

                </th>
                <td>
                    <?php echo e($cita->actividades->name); ?>

                </td>
                <?php if($role == 'usuarios'): ?>
                <td>
                    <?php echo e($cita->nombre_e); ?>

                </td>
                <?php elseif($role == 'empleados'): ?>
                <td>
                    <?php echo e($cita->usuario->name); ?>

                </td>
                <?php endif; ?>
                <td>
                    <?php echo e($cita->scheduled_date); ?>

                </td>
                <td>
                    <?php echo e($cita->Scheduled_Time_12); ?>

                </td>
                <td>
                    <?php echo e($cita->type); ?>

                </td>
                <td>

                <?php if($role == 'admin'): ?>
                <a href="<?php echo e(url('/miscitas/'.$cita->id)); ?>" class="btn btn-sm btn-info"  title="Ver Cita">
                <i class="fa-solid fa-eye"></i>
                </a>
                <?php endif; ?>
                    
                  <?php if($role == 'empleados' || $role == 'admin'): ?>
                    <form action="<?php echo e(url ('/miscitas/'.$cita->id.'/confirm')); ?>" method="POST"
                    class="d-inline-block">
                      <?php echo csrf_field(); ?>
                      
                      <button type="submit" class="btn btn-sm btn-success" title="Confrimar Cita">
                      <i class="ni ni-check-bold"></i>
                      </button>

                    </form>
                    <?php endif; ?>

                    <form action="<?php echo e(url ('/miscitas/'.$cita->id.'/cancel')); ?>" method="POST"
                    class="d-inline-block">
                      <?php echo csrf_field(); ?>
                      
                      <button type="submit" class="btn btn-sm btn-danger" title="Cancelar Cita">
                      <i class="ni ni-fat-delete"></i>
                      </button>

                    </form>
                    
                </td>
                
              </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div><?php /**PATH C:\laragon\www\CAM\resources\views/appointments/pending-appointments.blade.php ENDPATH**/ ?>