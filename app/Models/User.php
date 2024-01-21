<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cedula',
        'address',
        'phone',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'pivot'
    ];

    public function actividades(){
        return $this->belongsToMany(Actividades::class)->withTimestamps();
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function scopeUsuarios($query){
        return $query->where('role', 'usuarios');
    }

    public function scopeEmpleados($query){
        return $query->where('role', 'empleados');
    }

    public function asEmpleadosAppointment(){
        return $this ->hasMany(Appointment::class, 'empleadu_id');
    }

    public function attendedAppointment(){
        return $this->asEmpleadosAppointment()->where('status', 'Atendida');
    }

    
    public function cancellAppointment(){
        return $this->asEmpleadosAppointment()->where('status', 'Cancelada');
    }

    public function asUsuarioAppointment(){
        return $this ->hasMany(Appointment::class, 'usuario_id');
    }
}
