<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'scheduled_date',
        'scheduled_time',
        'type',
        'description',
        'empleadu_id',
        'usuario_id',
        'actividades_id'
    ];

    public function actividades(){
        return $this->belongsTo(Actividades::class);
    }

    public function empleados(){
        return $this->belongsTo(User::class);
    }

    public function appointments(){
        return $this->belongsTo(User::class);
    }

    public function usuario(){
        return $this->belongsTo(User::class);
    }

    public function getScheduledTime12Attribute(){
        return (new Carbon($this->scheduled_time))
        ->format('g:i A');
    }

    public function cancellation(){
        return $this->hasOne(CancelledAppointment::class);
    }
}
