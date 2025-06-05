<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//
use App\Models\Especialidad;
use App\Models\Persona;
use App\Models\Medico;
use Faker\Factory;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        $personas = Persona::pluck('id')->toArray();
        $especialidades = Especialidad::pluck('id')->toArray();

        if (empty($personas) || empty($especialidades)) {
            $this->command->warn('No hay personas o especialidades para asignar a médicos.');
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            Medico::create([
                'persona_id' => $faker->randomElement($personas),
                'cmp' => 'CMP' . $faker->numerify('######'), // CMP + 6 números al azar
                'especialidad_id' => $faker->randomElement($especialidades),
                'activo' => $faker->boolean(80), // 80% probabilidad que sea true
            ]);
        }
        //

    }
}
