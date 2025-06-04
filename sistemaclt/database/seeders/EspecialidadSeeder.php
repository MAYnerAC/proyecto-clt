<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Especialidad;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $especialidades = [
            ['nombre' => 'Pediatría', 'codigo_ups' => '000001', 'activo' => true],
            ['nombre' => 'Dermatología', 'codigo_ups' => '000002', 'activo' => false],
            ['nombre' => 'Oftalmología', 'codigo_ups' => '000003', 'activo' => true],
            ['nombre' => 'Ginecología', 'codigo_ups' => '000004', 'activo' => false],
            ['nombre' => 'Ortopedia', 'codigo_ups' => '000005', 'activo' => true],
            ['nombre' => 'Oncología', 'codigo_ups' => '000006', 'activo' => false],
            ['nombre' => 'Urología', 'codigo_ups' => '000007', 'activo' => true],
            ['nombre' => 'Endocrinología', 'codigo_ups' => '000008', 'activo' => false],
            ['nombre' => 'Neumología', 'codigo_ups' => '000009', 'activo' => true],
            ['nombre' => 'Gastroenterología', 'codigo_ups' => '000010', 'activo' => false],
        ];
    
        foreach ($especialidades as $esp) {
            Especialidad::create($esp);
        }    
    }
}
