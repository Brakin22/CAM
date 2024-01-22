<!-- Navigation -->
<!-- Heading -->
<h6 class="navbar-heading text-muted">
  <?php if(auth()->user()->role == 'admin'): ?>
    Gestión
  <?php else: ?>
    Menú
  <?php endif; ?>
</h6>
<ul class="navbar-nav">

<?php echo $__env->make('includes.panel.menu.'.auth()->user()->role, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <li class="nav-item">
  <a class="nav-link" href="<?php echo e(route ('logout')); ?>"onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
     <i class="fas fa-users text-danger"></i> Cerrar sesión
      </a>
      <form action="<?php echo e(route ('logout')); ?>" method="POST" style="display: none;" id="formLogout">
    <?php echo csrf_field(); ?>
    </form>
    </li>
  </ul>

  <?php if(auth ()->user()->role == 'admin'): ?>
  <!-- Divider -->
  <hr class="my-3">
  <!-- Heading -->
  <h6 class="navbar-heading text-muted">Reportes</h6>
  <!-- Navigation -->
  <ul class="navbar-nav mb-md-3">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo e(url('/reportes/citas/line')); ?>">
        <i class="ni ni-spaceship"></i> Citas
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo e(url('reportes/empleados/column')); ?>">
        <i class="ni ni-palette"></i> Desempeño
      </a>
    </li>
    
  </ul>
  <?php endif; ?>
  <?php /**PATH C:\xampp\htdocs\Version_nueva_Laravel\Version_03\CAM\resources\views/includes/panel/menu.blade.php ENDPATH**/ ?>