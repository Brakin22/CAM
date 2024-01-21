<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Actividades;
use App\Models\User;

class ActividadesController extends Controller
{
     public function index(){
        $actividades = Actividades::all();
        return view('actividades.index', compact('actividades'));
    }
    public function create(){
        return view('actividades.create');
    }
    public function sendData(Request $request){

        $rules =[
            'name' => 'required|min:3',
            
        ];

        $messages =[
            'name.required' => 'El nombre de la actividad es obligatorio.',
            'name.min' => 'El nombre de la actividad debe tener más de 3 caracteres.',
            
            
        ];
        $this->validate($request, $rules, $messages);


        $actividades = new Actividades();
        $actividades->name =$request->input('name');
        $actividades->description =$request->input('description');
        $actividades->save();
        $notification = 'La actividad se ha creado correctamente.';

        return redirect('/actividades')->with(compact('notification'));
    }

    public function edit(Actividades $actividades){
        return view('actividades.edit', compact('actividades'));
    }

    public function update(Request $request, Actividades $actividades){

        $rules =[
            'name' => 'required|min:3'
        ];

        $messages =[
            'name.required' => 'El nombre de la actividad es obligatorio.',
            'name.min' => 'El nombre de la actividad debe tener más de 3 caracteres.'
        ];

        $this->validate($request, $rules, $messages);

        $actividades->name =$request->input('name');
        $actividades->description =$request->input('description');
        $actividades->save();
        
        $notification = 'La actividad se ha actualizado correctamente.';

        return redirect('/actividades')->with(compact('notification'));
    }

    public function destroy(Actividades $actividades){
        $deleteName = $actividades->name;
        
        $actividades->delete('/actividades');

        $notification = 'La actividad '. $deleteName .'se ha eliminado correctamente.';

        return redirect('/actividades')->with(compact('notification'));
    }

}
