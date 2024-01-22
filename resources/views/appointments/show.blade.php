@extends('layouts.panel')

@section('content')

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Cita #{{ $appointments->id}}</h3>
            </div>
            <div class="col text-right">
              <a href="{{ url ('/miscitas')}}" class="btn btn-sm btn-success">
              <i class="fas fa-arrow-left"></i>    
                Regresar</a>
            </div>
          </div>
        </div>
      <div class="card-body">
        <ul>
            <dd>
                <strong>Fecha:</strong>{{$appointments->scheduled_date}}
            </dd>
            <dd>
                <strong>Hora de atención:</strong>{{$appointments->scheduled_time_12}}
            </dd>
            @if($role == 'usuarios' || $role == 'admin')
            <dd>
                <strong>Empleado:</strong>{{$appointments->nombre_e}}
            </dd>
            @elseif($role == 'empleados' || $role == 'admin')
            <dd>
                <strong>Usuario:</strong>{{$appointments->usuario->name}}
            </dd>
            @endif
            <dd>
                <strong>Actividad:</strong>{{$appointments->actividades->name}}
            </dd>
            <dd>
                <strong>Tipo de actividad:</strong>{{$appointments->type}}
            </dd>
            <dd>
                <strong>Estado:</strong>
                @if($appointments->status == 'Cancelada')
                <span class="badge badge-danger">Cancelada</span>
                @else
                <span class="badge badge-primary">{{ $appointments->status}}</span>
                @endif
            </dd>
            <dd>
                <strong>Desccripción:</strong>{{$appointments->description}}
            </dd>
            </ul>

            @if($appointments->status == 'Cancelada')
            <div class="alert bg-light text-primary">
                <h3>Detalles de la cancelación</h3>
                @if($appointments->cancellation)
                <ul>
                    <li>
                        <strong>Fecha de cancelación:</strong>
                        {{ $appointments->cancellation->created_at}}
                    </li>
                    <li>
                        <strong>La cita fue cancelada por:</strong>
                        {{ $appointments->cancellation->cancelled_by->name}}
                    </li>
                    <li>
                        <strong>Motivo de la cancelación:</strong>
                        {{ $appointments->cancellation->justification}}
                    </li>
                </ul>
                @else
                <ul>
                    <li>La cita fue cancelada antes de su confirmación.</li>
                </ul>
                @endif
            </div>
            @endif
      </div>

    </div>
@endsection