<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kriteria;

class KriteriaSeeder extends Seeder
{
    public function run()
    {
        Kriteria::create([
            'kriteria' => 'Kriteria 1',
            'fungsi_preferensi' => 'Preferensi 1',
            'min_max' => 'min',
            'bobot' => 0.5,
        ]);

        Kriteria::create([
            'kriteria' => 'Kriteria 2',
            'fungsi_preferensi' => 'Preferensi 2',
            'min_max' => 'max',
            'bobot' => 0.3,
        ]);
    }
}
