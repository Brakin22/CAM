<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
    <div class=" dropdown-header noti-title">
      <h6 class="text-overflow m-0">Bienvenidos!</h6>
    </div>
    <a href="/profile" class="dropdown-item">
      <i class="ni ni-single-02"></i>
      <span>Mi perfil</span>
    </a>
    <a href="/miscitas" class="dropdown-item">
      <i class="far fa-clock"></i>
      <span>Mis citas</span>
    </a>
    <a href="/reservarcitas/create" class="dropdown-item">
      <i class="ni ni-calendar-grid-58"></i>
      <span>Reservar cita</span>
    </a>
    
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="<?php echo e(route ('logout')); ?>"
    onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
      <i class="ni ni-user-run"></i>
      <span>Cerrar sesión</span>
      <form action="<?php echo e(route ('logout')); ?>" method="POST" style="display: none;" id="formLogout">
        <?php echo csrf_field(); ?>
        </form>
    </a>
  </div><?php /**PATH C:\xampp\htdocs\Version_nueva_Laravel\Version_03\CAM\resources\views/includes/panel/userOptions.blade.php ENDPATH**/ ?>