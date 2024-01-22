<?php
    use Illuminate\Support\Str;
?>
@extends('layouts.panel')

@section('styles')

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

@endsection

@section('content')

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Editar empleado</h3>
            </div>
            <div class="col text-right">
              <a href="{{ url ('/empleados')}}" class="btn btn-sm btn-success">
              <i class="fas fa-arrow-left"></i>    
                Regresar</a>
            </div>
          </div>
        </div>
       
    <div class="card-body">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
            <i class="fas fa-exclamation-triangle"></i>
                <strong>Por favor!</strong> {{ $error}}
            </div>
            @endforeach
            
        @endif

        <form action="{{ url('/empleados/'.$empleados->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre del empleado</label>
                <input type="text" name="name" class="form-control" value="{{old('name', $empleados->name)}}">
            </div>

            <div class="form-group">
                <label for="actividades">Actividades</label>
                <select name="actividades[]" id="actividades" class="form-control selectpicker"
                data-style="btn-primary" title="Seleccionar actividades" multiple required>
                @foreach ($actividades as $activida)
                    <option value="{{ $activida->id }}">{{  $activida->name }}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="text" name="email" class="form-control" value="{{old('email', $empleados->email)}}">
            </div>

            <div class="form-group">
                <label for="cedula">Cédula</label>
                <input type="text" name="cedula" class="form-control" value="{{old('cedula', $empleados->cedula)}}">
            </div>

            <div class="form-group">
                <label for="address">Dirección</label>
                <input type="text" name="address" class="form-control" value="{{old('address', $empleados->address)}}">
            </div>

            <div class="form-group">
                <label for="phone">Telefono / Móvil</label>
                <input type="text" name="phone" class="form-control" value="{{old('phone', $empleados->phone)}}">
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="text" name="password" class="form-control">
                <small class="text-warning">Solo llena el campo si desea cambiar la contraseña</small>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Guardar cambios</button>
        </form>
    </div>

</div>
@endsection

@section('scripts')

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script>
    $(document).ready(()=> {});
    $('#actividades').selectpicker('val', @json($activi_ids) );
</script>

@endsection