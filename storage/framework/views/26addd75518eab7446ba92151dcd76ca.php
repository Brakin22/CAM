

<?php $__env->startSection('content'); ?>

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Actividades</h3>
            </div>
            <div class="col text-right">
              <a href="<?php echo e(url ('/actividades/create')); ?>" class="btn btn-sm btn-primary">Nueva actividad</a>
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
                <th scope="col">Descripción</th>
                <th scope="col">Opciones</th>

              </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $actividades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actividad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <th scope="row">
                  <?php echo e($actividad->name); ?>

                </th>
                <td>
                    <?php echo e($actividad->description); ?>

                </td>
                <td>
                    
                    <form action="<?php echo e(url ('/actividades/'.$actividad->id)); ?>" method="POST">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('DELETE'); ?>

                      <a href="<?php echo e(url ('/actividades/'.$actividad->id.'/edit')); ?>" class="btn btn-sm btn-primary">Editar</a>
                      <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>

                    </form>
                    
                </td>
                
              </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\CAM\resources\views/actividades/index.blade.php ENDPATH**/ ?>