<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = User::usuarios()->paginate(10);
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
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
            'name.required' => 'El nombre del usuario es obligatorio',
            'name.min' => 'El nombre del usuario debe tener más de 3 caracteres',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'Ingresa una dirección de correo electrónico válido',
            'cedula.required' => 'La cédula es obligatoria',
            'cedula.digits' => 'La cédula debe de tener 10 dígitos',
            'address.min' => 'La dirección debe tener al menos 6 caracteres',
            'phone.required' => 'El número de teléfono es obligatorio',
        ];
        $this->validate($request, $rules, $messages);

        User::create(
            $request->only('name', 'email', 'cedula','address', 'phone')
            +[
                'role'=> 'usuarios',
                'password'=> bcrypt($request->input('password'))
            ]
        );
        $notification ='El usuario se ha registrado correctamente.';
        return redirect('/usuarios')->with(compact('notification'));
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
    public function edit(string $id)
    {
        $usuarios = User::Usuarios()->findOrFail($id);
        return view('usuarios.edit', compact('usuarios'));
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
            'name.required' => 'El nombre del usuario es obligatorio',
            'name.min' => 'El nombre del usuario debe tener más de 3 caracteres',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'Ingresa una dirección de correo electrónico válido',
            'cedula.required' => 'La cédula es obligatoria',
            'cedula.digits' => 'La cédula debe de tener 10 dígitos',
            'address.min' => 'La dirección debe tener al menos 6 caracteres',
            'phone.required' => 'El número de teléfono es obligatorio',
        ];
        $this->validate($request, $rules, $messages);
        $user = User::Usuarios()->findOrFail($id);

        $data = $request->only('name','email','cedula','address','phone');
        $password =$request->input('password');

        if($password)
            $data['password']=bcrypt($password);

        $user->fill($data);
        $user->save();

        $notification ='La información del usuario se actualizo correctamente.';
        return redirect('/usuarios')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::Usuarios()->findOrFail($id);
        $usuarioName = $user->name;
        $user->delete();

        $notification = "El empleado $usuarioName se elimino correctamente";

        return redirect('/usuarios')->with(compact('notification'));
    }
}
