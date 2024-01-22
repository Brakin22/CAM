

<?php $__env->startSection('content'); ?>

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Empleados</h3>
            </div>
            <div class="col text-right">
              <a href="<?php echo e(url ('/empleados/create')); ?>" class="btn btn-sm btn-primary">Nuevo empleado</a>
            </div>
          </div>
        </div>
      <div class="card-body">
        <?php if(session ('notification')): ?>
        <div class="alert alert-success" role="alert">
              <?php echo e(session ('notification')); ?>

      </div>
        <?php endif; ?>
      </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Cédula</th>
                <th scope="col">Opciones</th>

              </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $empleados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empleado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <th scope="row">
                  <?php echo e($empleado->name); ?>

                </th>
                <td>
                    <?php echo e($empleado->email); ?>

                </td>
                <td>
                    <?php echo e($empleado->cedula); ?>

                </td>
                <td>
                    
                    <form action="<?php echo e(url ('/empleados/'.$empleado->id)); ?>" method="POST">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('DELETE'); ?>

                      <a href="<?php echo e(url ('/empleados/'.$empleado->id.'/edit')); ?>" class="btn btn-sm btn-primary">Editar</a>
                      <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>

                    </form>
                    
                </td>
                
              </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
        <div class="card-body">
          <?php echo e($empleados->links()); ?>

        </div>
      </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Version_nueva_Laravel\Version_03\CAM\resources\views/empleados/index.blade.php ENDPATH**/ ?>