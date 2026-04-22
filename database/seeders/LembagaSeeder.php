<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LembagaPendidikan;

class LembagaSeeder extends Seeder
{
    public function run(): void
    {
        $lembaga = [
            ['kode_lembaga' => 'MI-ZBT',  'nama_lembaga' => 'Madrasah Ibtidaiyah (MI) Zaid bin Tsabit',    'status' => 'aktif'],
            ['kode_lembaga' => 'MTS-ZBT', 'nama_lembaga' => 'Madrasah Tsanawiyah (MTs) Zaid bin Tsabit',   'status' => 'aktif'],
            ['kode_lembaga' => 'MA-ZBT',  'nama_lembaga' => 'Madrasah Aliyah (MA) Zaid bin Tsabit',        'status' => 'aktif'],
            ['kode_lembaga' => 'SMK-ZBT', 'nama_lembaga' => 'SMK Zaid bin Tsabit',                         'status' => 'aktif'],
            ['kode_lembaga' => 'TPQ-ZBT', 'nama_lembaga' => 'Taman Pendidikan Al-Quran (TPQ)',             'status' => 'aktif'],
        ];

        foreach ($lembaga as $item) {
            LembagaPendidikan::firstOrCreate(['kode_lembaga' => $item['kode_lembaga']], $item);
        }
    }
}
