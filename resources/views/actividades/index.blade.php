@extends('layouts.panel')

@section('content')

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Actividades</h3>
            </div>
            <div class="col text-right">
              <a href="{{ url ('/actividades/create')}}" class="btn btn-sm btn-primary">Nueva actividad</a>
            </div>
          </div>
        </div>
      <div class="card-body">
        @if(session ('notification'))
        <div class="alert alert-success" role="alert">
              {{ session ('notification')}}
      </div>
        @endif
      </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Opciones</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($actividades as $actividad)
              <tr>
                <th scope="row">
                  {{$actividad->name}}
                </th>
                <td>
                    {{$actividad->description}}
                </td>
                <td>
                    
                    <form action="{{ url ('/actividades/'.$actividad->id)}}" method="POST">
                      @csrf
                      @method('DELETE')

                      <a href="{{ url ('/actividades/'.$actividad->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
                      <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>

                    </form>
                    
                </td>
                
              </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
@endsection
