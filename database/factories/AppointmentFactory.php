<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = $this->faker->dateTimeBetween('-1 years', 'now');
        $scheduled_date = $date->format('Y-m-d');
        $scheduled_time = $date->format('H:i:s');
        $types = ['Ludica', 'Comercialización', 'Emergencias'];
        $empleadoIds = User::empleados()->pluck('id');
        $usuarioIds = User::usuarios()->pluck('id');
        $statuses = ['Atendida', 'Cancelada'];
        return [
        'scheduled_date' => $scheduled_date ,
        'scheduled_time' => $scheduled_time,
        'type' => $this->faker->randomElement($types),
        'description' => $this->faker->sentence(5),
        'empleadu_id'=> $this->faker->randomElement($empleadoIds),
        'usuario_id'=> $this->faker->randomElement($usuarioIds),
        'actividades_id' => $this->faker->numberBetween(1,6),
        'status' => $this->faker->randomElement($statuses)
        ];
    }
}
