<div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Descripción</th>
                <th scope="col">Actividad</th>
                @if($role == 'usuarios')
                <th scope="col">Empledo</th>
                @elseif($role == 'empleados')
                <th scope="col">Usuario</th>
                @endif
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Tipo</th>
                <th scope="col">Estado</th>
                <th scope="col">Opciones</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($confirmedAppointments as $cita)
              <tr>
                <th scope="row">
                  {{$cita->description}}
                </th>
                <td>
                    {{$cita->actividades->name}}
                </td>
                @if($role == 'usuarios')
                <td>
                    {{$cita->nombre_e}}
                </td>
                @elseif($role == 'empleados')
                <td>
                    {{$cita->usuario->name}}
                </td>
                @endif
                <td>
                    {{$cita->scheduled_date}}
                </td>
                <td>
                    {{$cita->Scheduled_Time_12}}
                </td>
                <td>
                    {{$cita->type}}
                </td>
                <td>
                    {{$cita->status}}
                </td>
                <td>
                  @if($role == 'admin')
                <a href="{{ url('/miscitas/'.$cita->id)}}" class="btn btn-sm btn-info"  title="Ver Cita">
                  Ver
                </a>
                @endif
                <a href="{{ url('/miscitas/'.$cita->id.'/cancel')}}" class="btn btn-sm btn-danger"  title="Cancelar Cita">
                  Cancelar
                </a>
                    
                </td>
                
              </tr>
                @endforeach
            </tbody>
          </table>
        </div>