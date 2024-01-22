

<?php $__env->startSection('content'); ?>

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Reporte: Desempeño de los empleados</h3>
            </div>
            
          </div>
        </div>
      <div class="card-body">

        <div class="input-daterange datepicker row align-items-center" data-date-format="yyyy-mm-dd">
          <div class="col">
              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                      </div>
                      <input class="form-control" placeholder="echa de inicio" id="startDate"
                      type="text" value="<?php echo e($start); ?>">
                  </div>
              </div>
          </div>
          <div class="col">
              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                      </div>
                      <input class="form-control" placeholder="Fecha fin" id="endDate" 
                      type="text" value="<?php echo e($end); ?>">
                  </div>
              </div>
          </div>
      </div>
        <div id="container">

        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="<?php echo e(asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>

<script src="<?php echo e(asset('js/charts/emplead.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Version_nueva_Laravel\Version_03\CAM\resources\views/charts/emplead.blade.php ENDPATH**/ ?>