<?php
use Illuminate\Support\Str;
?>

@extends('layouts.panel')

@section('content')

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Editar usuario</h3>
            </div>
            <div class="col text-right">
              <a href="{{ url ('/usuarios')}}" class="btn btn-sm btn-success">
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

        <form action="{{ url('/usuarios/'.$usuarios->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre del usuario</label>
                <input type="text" name="name" class="form-control" value="{{old('name', $usuarios->name)}}">
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="text" name="email" class="form-control" value="{{old('email', $usuarios->email)}}">
            </div>

            <div class="form-group">
                <label for="cedula">Cédula</label>
                <input type="text" name="cedula" class="form-control" value="{{old('cedula', $usuarios->cedula)}}">
            </div>

            <div class="form-group">
                <label for="address">Dirección</label>
                <input type="text" name="address" class="form-control" value="{{old('address', $usuarios->address)}}">
            </div>

            <div class="form-group">
                <label for="phone">Telefono / Móvil</label>
                <input type="text" name="phone" class="form-control" value="{{old('phone', $usuarios->phone)}}">
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="text" name="password" class="form-control">
                <small class="text-warning">Solo llena el campo si desea cambiar la contraseña.</small>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Guardar cambios</button>
        </form>
    </div>

</div>
@endsection