@extends('layouts.panel')

@section('content')

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Nueva actividad</h3>
            </div>
            <div class="col text-right">
              <a href="{{ url ('/actividades')}}" class="btn btn-sm btn-success">
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

        <form action="{{ url('/actividades')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre de la actividad</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <input type="text" name="description" class="form-control" value="{{old('description')}}">
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Crear actividad</button>
        </form>
    </div>

</div>
@endsection