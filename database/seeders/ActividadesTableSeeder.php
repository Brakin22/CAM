<?php

namespace Database\Seeders;

use App\Models\Actividades;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class ActividadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actividades = [
            'Reposteria',
            'Costuras',
            'Basquetball',
            'Pasteleria',
            'Psicologia',
            'Primeros Auxilios'
        ];
        foreach($actividades as $activiName){
            $activi = Actividades::create([
                'name' => $activiName
            ]);
            $activi->users()->saveMany(
                User::factory(4)->state(['role' => 'empleados'])->make()
            );
        }
        User::find(3)->actividades()->save($activi);
    }
}
