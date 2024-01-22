

<?php $__env->startSection('content'); ?>

    <form action="<?php echo e(url('/horario')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Gestionar Horario</h3>
                </div>
                <div class="col text-right">
                  <button type="submit" class="btn btn-sm btn-primary">
                    Guardar cambios</button>
                </div>
              </div>
            </div>
          <div class="card-body">
            <?php if(session ('notification')): ?>
            <div class="alert alert-success" role="alert">
                  <?php echo e(session ('notification')); ?>

          </div>
            <?php endif; ?>

            <?php if(session ('errors')): ?>
            <div class="alert alert-danger" role="alert">
                Los cambios se han guardado, pero se encontraron las siguientes novedades:
                <ul>
                    <?php $__currentLoopData = session('errors'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                  
          </div>
            <?php endif; ?>

          </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Día</th>
                    <th scope="col">Activo</th>
                    <th scope="col">Turno mañana</th>
                    <th scope="col">Turno tarde</th>
    
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $horarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $horario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th><?php echo e($days[$key]); ?></th>
                            <td> 
                                <label class="custom-toggle">
                                    <input type="checkbox" name="active[]" value="<?php echo e($key); ?>"
                                     <?php if($horario->active): ?> checked <?php endif; ?>
                                     >
                                    <span class="custom-toggle-slider rounded-circle"></span>
                                  </label>
                            </td>
    
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="morning_start[]">
                                            <?php for($i=7; $i<=12; $i++): ?>

                                            <option value="<?php echo e(($i<11 ? '0' : '') . $i); ?>:00"
                                            <?php if($i.':00 AM' == $horario->morning_start): ?> selected <?php endif; ?>>
                                            <?php echo e($i); ?>:00 AM</option>

                                            <option value="<?php echo e(($i<11 ? '0' : '') . $i); ?>:30"
                                            <?php if($i.':30 AM' == $horario->morning_start): ?> selected <?php endif; ?>>
                                                <?php echo e($i); ?>:30 AM</option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    
                                    <div class="col">
                                        <select class="form-control" name="morning_end[]">
                                            <?php for($i=7; $i<=12; $i++): ?>

                                            <option value="<?php echo e(($i<11 ? '0' : '') . $i); ?>:00"
                                            <?php if($i.':00 AM' == $horario->morning_end): ?> selected <?php endif; ?>>
                                                <?php echo e($i); ?>:00 AM</option>
                                            
                                            <option value="<?php echo e(($i<11 ? '0' : '') . $i); ?>:30"
                                            <?php if($i.':30 AM' == $horario->morning_end): ?> selected <?php endif; ?>>
                                            <?php echo e($i); ?>:30 AM</option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                            </td>
    
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="afternoon_start[]">
                                            <?php for($i=2; $i<=10; $i++): ?>

                                            <option value="<?php echo e($i+12); ?>:00"
                                            <?php if($i.':00 PM' == $horario->afternoon_start): ?> selected <?php endif; ?>>
                                                <?php echo e($i); ?>:00 PM</option>

                                            <option value="<?php echo e($i+12); ?>:30"
                                            <?php if($i.':30 PM' == $horario->afternoon_start): ?> selected <?php endif; ?>>
                                            <?php echo e($i); ?>:30 PM</option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="afternoon_end[]">
                                            <?php for($i=2; $i<=10; $i++): ?>

                                            <option value="<?php echo e($i+12); ?>:00"
                                            <?php if($i.':00 PM' == $horario->afternoon_end): ?> selected <?php endif; ?>>
                                            <?php echo e($i); ?>:00 PM</option>
                                            
                                            <option value="<?php echo e($i+12); ?>:30"
                                            <?php if($i.':30 PM' == $horario->afternoon_end): ?> selected <?php endif; ?>>
                                            <?php echo e($i); ?>:30 PM</option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>

    </form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Version_nueva_Laravel\CAM\resources\views/horario.blade.php ENDPATH**/ ?>