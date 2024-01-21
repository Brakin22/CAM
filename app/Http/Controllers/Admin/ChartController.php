<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function appointmens(){
        
            $mounthCounts = Appointment::select(
                DB::raw('MONTH(created_at)as month'),
                DB::raw('COUNT(1) as count'))
                ->groupBy('month')
                ->get()
                ->toArray();
            $counts = array_fill(0, 12, 0);
            foreach($mounthCounts as $mounthCount){
                $index = $mounthCount['month']-1;
                $counts[$index] = $mounthCount['count'];

            }

            
        return view('charts.appointmens', compact('counts')); 
    }

    public function emplead(){
        $now = Carbon::now();
        $end = $now->format('Y-m-d');
        $start = $now->subYear()->format('Y-m-d');

        return view ('charts.emplead', compact('end', 'start'));   
    }
    public function empleadJson(Request $request){

        $start = $request->input('start');
        $end = $request->input('end');

        $e_emplead = User::empleados()
        ->select('name')
        ->withCount(['attendedAppointment' => function($query) use ($start, $end){
            $query->whereBetween('scheduled_date', [$start, $end]);
        }
        , 'cancellAppointment'=> function($query) use ($start, $end){
            $query->whereBetween('scheduled_date', [$start, $end]);
        }
        ])
        ->orderBy('attended_appointment_count', 'desc')
        ->take(5)
        ->get();

        $data = [];
        $data['categories'] = $e_emplead->pluck('name');

        $series = [];
        $series1['name'] = 'Citas atendidas';
        $series1['data'] = $e_emplead->pluck('attended_appointment_count');
        $series2['name'] = 'Citas canceladas';
        $series2['data'] = $e_emplead->pluck('cancell_appointment_count');

        $series[]= $series1;
        $series[]= $series2;
        $data['series'] = $series;

        return $data;
    }
   
}
