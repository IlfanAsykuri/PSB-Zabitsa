<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Logistik;

class LogistikSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['kode_logistik' => 'LOG-GAMIS',   'nama_logistik' => 'Gamis Santri',     'kategori' => 'seragam', 'status' => 'aktif'],
            ['kode_logistik' => 'LOG-SONGKOK', 'nama_logistik' => 'Songkok',          'kategori' => 'seragam', 'status' => 'aktif'],
            ['kode_logistik' => 'LOG-SARUNG',  'nama_logistik' => 'Sarung',           'kategori' => 'seragam', 'status' => 'aktif'],
            ['kode_logistik' => 'LOG-BUKU',    'nama_logistik' => 'Paket Buku',       'kategori' => 'buku',    'status' => 'aktif'],
            ['kode_logistik' => 'LOG-KITAB',   'nama_logistik' => 'Kitab Kuning',     'kategori' => 'buku',    'status' => 'aktif'],
            ['kode_logistik' => 'LOG-KARTU',   'nama_logistik' => 'Kartu Santri',     'kategori' => 'lainnya', 'status' => 'aktif'],
        ];

        foreach ($items as $item) {
            Logistik::firstOrCreate(['kode_logistik' => $item['kode_logistik']], $item);
        }
    }
}
