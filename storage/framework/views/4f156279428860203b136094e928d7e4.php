

<?php $__env->startSection('content'); ?>

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Mis Citas</h3>
            </div>
          </div>
        </div>
      <div class="card-body">
        <?php if(session ('notification')): ?>
        <div class="alert alert-success" role="alert">
              <?php echo e(session ('notification')); ?>

      </div>
        <?php endif; ?>


        <div class="nav-wrapper">
    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0 active" data-toggle="tab" 
            href="#mis-citas" role="tab" aria-selected="true">
            <i class="ni ni-calendar-grid-58 mr-2"></i>Mis Citas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" data-toggle="tab" 
            href="#citas-pendientes" role="tab" aria-selected="false">
            <i class="ni ni-bell-55 mr-2"></i>Citas Pendientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" data-toggle="tab" 
            href="#historial" role="tab" aria-selected="false">
            <i class="ni ni-folder-17 mr-2"></i>Historial</a>
        </li>
    </ul>
</div>

      </div>

      <div class="card shadow">
    <div class="card">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="mis-citas" role="tabpanel">
            <?php echo $__env->make('appointments.tables.confirmed-appointments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="tab-pane fade" id="citas-pendientes" role="tabpanel">
            <?php echo $__env->make('appointments.tables.pending-appointments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
          </div>
            <div class="tab-pane fade" id="historial" role="tabpanel">
            <?php echo $__env->make('appointments.tables.old-appointments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
          </div>
        </div>
    </div>
</div>
       
      </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Version_nueva_Laravel\Version_03\CAM\resources\views/appointments/index.blade.php ENDPATH**/ ?>