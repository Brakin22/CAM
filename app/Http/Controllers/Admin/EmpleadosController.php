<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actividades;
use Illuminate\Http\Request;
use App\Models\User;

class EmpleadosController extends Controller
{

    public function index()
    {
        $empleados = User::empleados()->paginate(10);
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        $actividades = Actividades::all();
        return view('empleados.create', compact('actividades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules =[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|digits:10',
            'address' => 'required|min:6',
            'phone' => 'required',

        ];
        $messages =[
            'name.required' => 'El nombre del empleado es obligatorio',
            'name.min' => 'El nombre del empleado debe tener más de 3 caracteres',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'Ingresa una dirección de correo electrónico válido',
            'cedula.required' => 'La cédula es obligatoria',
            'cedula.digits' => 'La cédula debe de tener 10 dígitos',
            'address.min' => 'La dirección debe tener al menos 6 caracteres',
            'phone.required' => 'El número de teléfono es obligatorio',
        ];
        $this->validate($request, $rules, $messages);

        $user = User::create(
            $request->only('name', 'email', 'cedula','address', 'phone')
            +[
                'role'=> 'empleados',
                'password'=> bcrypt($request->input('password'))
            ]
        );
        $user->actividades()->attach($request->input('actividades'));
        $notification ='El empleado se ha registrado correctamente.';
        return redirect('/empleados')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empleados = User::empleados()->findOrFail($id);

        $actividades = Actividades::all(); 
        $activi_ids = $empleados->actividades()->pluck('actividades.id');

        return view('empleados.edit', compact('empleados', 'actividades', 'activi_ids'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules =[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|digits:10',
            'address' => 'required|min:6',
            'phone' => 'required',

        ];
        $messages =[
            'name.required' => 'El nombre del empleado es obligatorio',
            'name.min' => 'El nombre del empleado debe tener más de 3 caracteres',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'Ingresa una dirección de correo electrónico válido',
            'cedula.required' => 'La cédula es obligatoria',
            'cedula.digits' => 'La cédula debe de tener 10 dígitos',
            'address.min' => 'La dirección debe tener al menos 6 caracteres',
            'phone.required' => 'El número de teléfono es obligatorio',
        ];
        $this->validate($request, $rules, $messages);
        $user = User::empleados()->findOrFail($id);

        $data = $request->only('name','email','cedula','address','phone');
        $password =$request->input('password');

        if($password)
            $data['password']=bcrypt($password);

        $user->fill($data);
        $user->save();
        $user->actividades()->sync($request->input('actividades')); 

        $notification ='La información del empleado se actualizo correctamente.';
        return redirect('/empleados')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::empleados()->findOrFail($id);
        $empleadoName = $user->name;
        $user->delete();

        $notification = "El empleado $empleadoName se elimino correctamente";

        return redirect('/empleados')->with(compact('notification'));
    }
}
