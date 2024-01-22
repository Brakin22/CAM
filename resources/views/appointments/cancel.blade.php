@extends('layouts.panel')

@section('content')

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Cancelar Cita</h3>
            </div>
            <div class="col text-right">
              <a href="{{ url ('/miscitas')}}" class="btn btn-sm btn-success">
              <i class="fas fa-arrow-left"></i>    
                Regresar</a>
            </div>
          </div>
        </div>
      <div class="card-body">
        @if(session ('notification'))
        <div class="alert alert-success" role="alert">
              {{ session ('notification')}}
      </div>
        @endif

        @if($role == 'usuarios')
        <p>Se cancelara tú cita reservada con el empleado <b>{{ $appointments->nombre_e}}</b>
            (actividad) <b>{{ $appointments->actividades->name}}</b>
            para el dia <b>{{ $appointments->scheduled_date}}</b>.</p>
        @elseif($role == 'empleados')
        <p>Se cancelara tú cita reservada con el usuario <b>{{ $appointments->usuario->name}}</b>
            (actividad) <b>{{ $appointments->actividades->name}}</b>
            para el dia <b>{{ $appointments->scheduled_date}}</b>
            para en la hora <b>{{ $appointments->scheduled_time_12}}</b>.
          </p>
            @else
            Se cancelara tú cita reservada con el usuario <b>{{ $appointments->usuario->name}}</b>
            que sera atendido por el Empleado <b>{{ $appointments->nombre_e}}</b>
            (actividad) <b>{{ $appointments->actividades->name}}</b>
            para el dia <b>{{ $appointments->scheduled_date}}</b>
            para el dia <b>{{ $appointments->scheduled_time_12}}</b>.
          </p>
          @endif
            <form action="{{ url('/miscitas/'.$appointments->id.'/cancel')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="justification">Ponga los motivos de la cancelación:</label>
                    <textarea name="justification" id="justification" rows="3" class="form-control" required></textarea>
                </div>
                
                <button class="btn btn-danger" type="submit">Cancelar cita</button>
            </form>
      </div>

    </div>
@endsection