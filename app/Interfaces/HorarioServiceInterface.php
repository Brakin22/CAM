<?php namespace App\Interfaces;

use Carbon\Carbon;

interface HorarioServiceInterface {
    public function isAvailableInterval($date, $empleadoId, Carbon $start);
    public function getAvailableIntervals($date, $empleadoId);
}