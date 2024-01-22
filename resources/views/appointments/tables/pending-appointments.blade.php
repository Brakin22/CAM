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
                <th scope="col">Opciones</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($pendingAppointments as $cita)
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

                @if($role == 'admin')
                <a href="{{ url('/miscitas/'.$cita->id)}}" class="btn btn-sm btn-info"  title="Ver Cita">
                <i class="fa-solid fa-eye"></i>
                </a>
                @endif
                    
                  @if($role == 'empleados' || $role == 'admin')
                    <form action="{{ url ('/miscitas/'.$cita->id.'/confirm')}}" method="POST"
                    class="d-inline-block">
                      @csrf
                      
                      <button type="submit" class="btn btn-sm btn-success" title="Confrimar Cita">
                      <i class="ni ni-check-bold"></i>
                      </button>

                    </form>
                    @endif

                    <form action="{{ url ('/miscitas/'.$cita->id.'/cancel')}}" method="POST"
                    class="d-inline-block">
                      @csrf
                      
                      <button type="submit" class="btn btn-sm btn-danger" title="Cancelar Cita">
                      <i class="ni ni-fat-delete"></i>
                      </button>

                    </form>
                    
                </td>
                
              </tr>
                @endforeach
            </tbody>
          </table>
        </div>