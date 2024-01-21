<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Actividades;
use Illuminate\Http\Request;

class ActividadesController extends Controller
{
    public function emplead(Actividades $actividades){
        return $actividades->users()->get([
            'users.id',
            'users.name'
        ]);

    }
}
