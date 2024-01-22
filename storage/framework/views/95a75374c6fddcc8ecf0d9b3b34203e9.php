

<?php $__env->startSection('title', 'Inicia Sesión'); ?>

<?php $__env->startSection('content'); ?>

<!-- Page content -->
<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary shadow border-0">
          
          <div class="card-body px-lg-5 py-lg-5">

            <?php if($errors->any()): ?>
            <div class="text-center text-muted mb-2">
              <h4>Se encontro el siguiente error.</h4>
            </div>
            
            <div class="alert alert-danger mb-4" role="alert">
                     <?php echo e($errors->first()); ?>

            </div>
            <?php else: ?>
            <div class="text-center text-muted mb-4">
              <small>Ingresa tus credenciales para Iniciar Sesión</small>
            </div>
            <?php endif; ?>
            
            <form role="form" method="POST" action="<?php echo e(route('login')); ?>">
              <?php echo csrf_field(); ?>
              <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input class="form-control" placeholder="Correo Electrónico" type="email" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input class="form-control" placeholder="Contraseña" type="password" name="password" required autocomplete="current-password">
                </div>
              </div>
              <div class="custom-control custom-control-alternative custom-checkbox">
                <input name="remember"class="custom-control-input" id="remember" type="checkbox" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                <label class="custom-control-label" for="remember">
                  <span class="text-muted">Recordar Sesión</span>
                </label>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">Empezar</button>
              </div>
            </form>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-6">
            <a href="<?php echo e(route('password.request')); ?>" class="text-light"><small>¿Olvidaste tu contraseña?</small></a>
          </div>
          <div class="col-6 text-right">
            <a href="<?php echo e(route ('register')); ?>" class="text-light"><small>Crear cuenta nueva</small></a>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\CAM\resources\views/auth/login.blade.php ENDPATH**/ ?>