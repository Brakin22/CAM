<?php namespace App\Services;

use App\Interfaces\HorarioServiceInterface;
use App\Models\Appointment;
use App\Models\Horarios;
use Carbon\Carbon;

class HorarioService implements HorarioServiceInterface{
    
    private function getDayFromDate($date){
        $dateCarbon = new Carbon($date);
        $i = $dateCarbon->dayOfWeek;
        $day = ($i==0 ? 6 : $i-1);
        return $day;
    } 

    public function isAvailableInterval($date, $empleadoId, Carbon $start){
        $exists = Appointment::where('empleadu_id', $empleadoId)
            ->where('scheduled_date', $date)
            ->where('scheduled_time', $start->format('H:i:s'))
            ->exists();

            return !$exists;
    }

    public function getAvailableIntervals($date, $empleadoId){
        $horario = Horarios::where('active', true)
            ->where('day', $this->getDayFromDate($date))
            ->where('user_id', $empleadoId)
            ->first([
                'morning_start', 'morning_end',
                'afternoon_start', 'afternoon_end' 
            ]);

            if(!$horario){
                return [];
            }

            $morningIntervalos = $this->getIntervalos(
                $horario->morning_start, $horario->morning_end, $empleadoId, $date
            );

            $afternoonIntervalos = $this->getIntervalos(
                $horario->afternoon_start, $horario->afternoon_end, $empleadoId, $date
            );

            $data = [];
            $data['morning'] = $morningIntervalos;
            $data['afternoon'] = $afternoonIntervalos;
            return $data;
    }

    /**
     * Summary of getIntervalos
     * @param mixed $start
     * @param mixed $end
     * @return array
     */
    private function getIntervalos($start, $end, $empleadoId, $date){
        $start = new Carbon($start);
        $end = new Carbon($end);

        $intervalos = []; 
        while($start < $end ){
            $intervalo = [];
            $intervalo['start'] = $start->format('g:i A');

            $available = $this->isAvailableInterval($date, $empleadoId, $start);

            $start->addMinutes(30);
            $intervalo['end'] = $start->format('g:i A');

            if($available){
            $intervalos [] = $intervalo;
            }

        } 

        return $intervalos;

    }
}
