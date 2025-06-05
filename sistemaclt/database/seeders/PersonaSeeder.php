<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//
use App\Models\Persona;
use Faker\Factory;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 15; $i++) {
            Persona::create([
                'nombre' => $faker->firstName,
                'apellido_paterno' => $faker->lastName,
                'apellido_materno' => $faker->lastName,
                'tipo_documento' => $faker->randomElement(['DNI', 'CE', 'PAS']),
                'numero_documento' => $faker->unique()->numerify('########'),
                'telefono' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'direccion' => $faker->address,
                'ubigeo' => $faker->numerify('######'),
            ]);
        }

        //
    }
}
