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

<?php if(auth()->user()->role == 'admin'): ?> 

    <li class="nav-item  active ">
      <a class="nav-link  active " href="/home">
        <i class="ni ni-tv-2 text-danger"></i> Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="<?php echo e(url('/actividades')); ?>">
        <i class="fas fa-users text-orange"></i> Actividades
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="/empleados">
        <i class="ni ni-pin-3 text-orange"></i> Empleados
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="/usuarios">
        <i class="ni ni-single-02 text-yellow"></i> Usuarios
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link " href="/miscitas">
        <i class="fas fa-clock text-info"></i> Citas Medicas
      </a>
    </li>

    <?php elseif(auth()->user()->role == 'empleados'): ?>
    <li class="nav-item">
      <a class="nav-link " href="/horario">
        <i class="ni ni-calendar-grid-58 text-primary"></i> Gestionar horario
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link " href="/miscitas">
        <i class="fas fa-clock text-info"></i> Mis citas
      </a>
    </li>    

    <li class="nav-item">
      <a class="nav-link " href=" ">
        <i class="fas fa-bed text-danger"></i> Mis Usuarios
      </a>
    </li>

    <?php else: ?>

    <li class="nav-item">
      <a class="nav-link " href="/reservarcitas/create">
        <i class="ni ni-calendar-grid-58 text-primary"></i> Reservar cita
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link " href="/miscitas">
        <i class="fas fa-clock text-info"></i> Mis citas
      </a>
    </li>    

    <?php endif; ?>
    
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
      <a class="nav-link" href="#">
        <i class="ni ni-spaceship"></i> Citas
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="ni ni-palette"></i> Desempeño
      </a>
    </li>
    
  </ul>
  <?php endif; ?>
  <?php /**PATH C:\laragon\www\CAM\resources\views/includes/panel/menu.blade.php ENDPATH**/ ?>