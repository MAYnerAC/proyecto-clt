<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//
use App\Models\Especialidad;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $especialidades = [
            ['nombre' => 'Alergología', 'codigo_ups' => '000001', 'activo' => true],
            ['nombre' => 'Anatomía Patológica', 'codigo_ups' => '000002', 'activo' => false],
            ['nombre' => 'Anestesiología', 'codigo_ups' => '000003', 'activo' => true],
            ['nombre' => 'Cardiología', 'codigo_ups' => '000004', 'activo' => false],
            ['nombre' => 'Cirugia de Cabeza y Cuello', 'codigo_ups' => '000005', 'activo' => true],
            ['nombre' => 'Cirugía de Torax y Cardiovascular', 'codigo_ups' => '000006', 'activo' => false],
            ['nombre' => 'Cirugía General', 'codigo_ups' => '000007', 'activo' => true],
            ['nombre' => 'Cirugía Pediátrica', 'codigo_ups' => '000008', 'activo' => false],
            ['nombre' => 'Dermatología', 'codigo_ups' => '000009', 'activo' => true],
            ['nombre' => 'Endocrinología', 'codigo_ups' => '000010', 'activo' => false],
            ['nombre' => 'Gastroenterología', 'codigo_ups' => '000011', 'activo' => true],
            ['nombre' => 'Ginecología y Obstetricia', 'codigo_ups' => '000012', 'activo' => false],
            ['nombre' => 'Hematología', 'codigo_ups' => '000013', 'activo' => true],
            ['nombre' => 'Infectología', 'codigo_ups' => '000014', 'activo' => false],
            ['nombre' => 'Medicina Física y Rehabilitación', 'codigo_ups' => '000015', 'activo' => true],
            ['nombre' => 'Medicina General', 'codigo_ups' => '000016', 'activo' => false],
            ['nombre' => 'Medicina Interna', 'codigo_ups' => '000017', 'activo' => true],
            ['nombre' => 'Nefrología', 'codigo_ups' => '000018', 'activo' => false],
            ['nombre' => 'Neumología', 'codigo_ups' => '000019', 'activo' => true],
            ['nombre' => 'Neurocirugía', 'codigo_ups' => '000020', 'activo' => false],
            ['nombre' => 'Neurología', 'codigo_ups' => '000021', 'activo' => true],
            ['nombre' => 'Odontología', 'codigo_ups' => '000022', 'activo' => false],
            ['nombre' => 'Oftalmología', 'codigo_ups' => '000023', 'activo' => true],
            ['nombre' => 'Oncología Clínica', 'codigo_ups' => '000024', 'activo' => false],
            ['nombre' => 'Oncología Quirúrgica', 'codigo_ups' => '000025', 'activo' => true],
            ['nombre' => 'Otorrinolaringología', 'codigo_ups' => '000026', 'activo' => false],
            ['nombre' => 'Pediatría', 'codigo_ups' => '000027', 'activo' => true],
            ['nombre' => 'Psiquiatría', 'codigo_ups' => '000028', 'activo' => false],
            ['nombre' => 'Radiología', 'codigo_ups' => '000029', 'activo' => true],
            ['nombre' => 'Reumatología', 'codigo_ups' => '000030', 'activo' => false],
            ['nombre' => 'Traumatología', 'codigo_ups' => '000031', 'activo' => true],
            ['nombre' => 'Urología', 'codigo_ups' => '000032', 'activo' => false],
        ];

        foreach ($especialidades as $esp) {
            Especialidad::create($esp);
        }
    }
}
