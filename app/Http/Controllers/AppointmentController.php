<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Interfaces\HorarioServiceInterface;
use App\Models\Actividades;
use App\Models\CancelledAppointment;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function index(){

        $role = auth()->user()->role;

        if($role == 'admin'){

        $appointments = Appointment::join('users','appointments.empleadu_id','users.id')
        ->select('appointments.*','users.name as nombre_e')
        ->get();

        //Admin
        $confirmedAppointments = Appointment::join('users','appointments.empleadu_id','users.id')
        ->select('appointments.*','users.name as nombre_e')
        ->get()
        ->where('status', 'Confirmada');
    
        $pendingAppointments = Appointment::join('users','appointments.empleadu_id','users.id')
        ->select('appointments.*','users.name as nombre_e')
        ->get()
        ->where('status', 'Reservada');
    
        $oldAppointments = Appointment::join('users','appointments.empleadu_id','users.id')
        ->select('appointments.*','users.name as nombre_e')
        ->get()
        ->whereIn('status', ['Atendida','Cancelada']);

        }elseif($role == 'empleados'){

        $appointments = Appointment::join('users','appointments.empleadu_id','users.id')
        ->select('appointments.*','users.name as nombre_e')
        ->get();
        
        //Empleados
        $confirmedAppointments = Appointment::join('users','appointments.empleadu_id','users.id')
        ->select('appointments.*','users.name as nombre_e')
        ->get()
        ->where('status', 'Confirmada')
        ->where('empleadu_id', auth()->id());
    
        $pendingAppointments = Appointment::join('users','appointments.empleadu_id','users.id')
        ->select('appointments.*','users.name as nombre_e')
        ->get()
        ->where('status', 'Reservada')
        ->where('empleadu_id', auth()->id());
    
        $oldAppointments = Appointment::join('users','appointments.empleadu_id','users.id')
        ->select('appointments.*','users.name as nombre_e')
        ->get()
        ->whereIn('status', ['Atendida','Cancelada'])
        ->where('empleadu_id', auth()->id());

        }elseif($role == 'usuarios'){

        $appointments = Appointment::join('users','appointments.empleadu_id','users.id')
        ->select('appointments.*','users.name as nombre_e')
        ->get();
        
        $confirmedAppointments = Appointment::join('users','appointments.empleadu_id','users.id')
        ->select('appointments.*','users.name as nombre_e')
        ->get()
        ->where('status', 'Confirmada')
        ->where('usuario_id', auth()->id());

        $pendingAppointments = Appointment::join('users','appointments.empleadu_id','users.id')
        ->select('appointments.*','users.name as nombre_e')
        ->get()
        ->where('status', 'Reservada')
        ->where('usuario_id', auth()->id());

        $oldAppointments = Appointment::join('users','appointments.empleadu_id','users.id')
        ->select('appointments.*','users.name as nombre_e')
        ->get()
        ->whereIn('status', ['Atendida','Cancelada'])
        ->where('usuario_id', auth()->id());

        }

        
        return view('appointments.index', 
        compact('confirmedAppointments','pendingAppointments','oldAppointments','role','appointments'));
    }
    public function create (HorarioServiceInterface $horarioServiceInterface){
        $actividades = Actividades::all();

        $actividId = old('actividades_id');
        if($actividId){
            $activi = Actividades::find($actividId);
            $emplead = $activi->users;
        }else {
            $emplead = collect();
        }

        $date = old('schedule_date');
        $empleadoId = old('empleadu_id');
        if($date && $empleadoId){
            $intervals = $horarioServiceInterface->getAvailableIntervals($date, $empleadoId);
        } else {
            $intervals = null;
        }

        return view ('appointments.create', compact('actividades','emplead','intervals'));
    }

    public function store(Request $request, HorarioServiceInterface $horarioServiceInterface){

        $rules = [
            'scheduled_time' => 'required',
            'type' => 'required',
            'description' =>'required',
            'empleadu_id' =>'exists:users,id',
            'actividades_id' =>'exists:actividades,id' 
        ];

        $messages = [
            'scheduled_time.required' => 'Debe seleccionar una hora para su cita.',
            'type.required' => 'Debe seleccionar el tipo de actividad.',
            'description.required' => 'Debe ingresar una descripción para su cita.',
             
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        $validator->after(function ($validator) use ($request, $horarioServiceInterface) {
            
            $date = $request->input('scheduled_date');
            $empleadoId = $request->input('empleadu_id');
            $scheduled_time = $request->input('scheduled_time');
            if ($date && $empleadoId && $scheduled_time){
            $start = new Carbon($scheduled_time);
        }  else {
            return;
        }

            if (!$horarioServiceInterface->isAvailableInterval($date, $empleadoId, $start)) {
                $validator->errors()->add(
                    'available_time', 'La hora seleccionada ya se encuentra reservada por otro usuario.'
                );
            }
        });
        
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $request->only([
        'scheduled_date',
        'scheduled_time',
        'type',
        'description',
        'empleadu_id',
        'actividades_id'
        ]);
        $data['usuario_id'] = auth()->id();

        $carbonTime = Carbon::createFromFormat('g:i A', $data['scheduled_time']);
        $data['scheduled_time'] = $carbonTime->format('H:i:s');

        Appointment::create($data);

        $notification = 'La cita se ha realizado correctamente.';
        return redirect('/miscitas')->with(compact('notification'));
    }

    public function cancel(Appointment $appointments, Request $request){
        
        if($request->has('justification')){
            $cancellation = new CancelledAppointment();
            $cancellation->justification = $request->input('justification');
            $cancellation->cancelled_by_id = auth()->id();

            $appointments->cancellation()->save($cancellation);
        }

        $appointments->status ="Cancelada";
        $appointments->save();
        $notification = 'La cita se ha cancelado correctamente.';

        return redirect('/miscitas')->with(compact('notification'));

    }

    public function confirm (Appointment $appointments){
        
        $appointments->status = "Confirmada";
        $appointments->save();
        $notification = 'La cita se ha confirmada correctamente.';

        return redirect('/miscitas')->with(compact('notification'));
    }

    public function formCancel(Appointment $appointments){
        
        $appointments = Appointment::join('users','appointments.empleadu_id','users.id')
        ->select('appointments.*','users.name as nombre_e')
        ->where('appointments.id',$appointments->id)
        ->first();



        if($appointments->status == 'Confirmada'){
            $role = auth()->user()->role;
            return view('appointments.cancel', compact('appointments','role'));
        }
        return redirect('/miscitas');
    }

    public function show(Appointment $appointments){
        $appointments = Appointment::join('users','appointments.empleadu_id','users.id')
        ->select('appointments.*','users.name as nombre_e')
        ->where('appointments.id',$appointments->id)
        ->first();


        $role = auth()->user()->role;
        
        return view('appointments.show', compact('appointments','role'));
    }
}
