<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Alternatif;

class EvaluasiController extends Controller
{
    public function index()
    {
        // Ambil data kriteria
        $kriteria = Kriteria::all();
        
        // Siapkan array untuk evaluasi matriks
        $evaluasiMatrix = [];
        
        foreach ($kriteria as $k) {
            $row = [];
            $row['kriteria'] = $k->kriteria;
            $row['min_max'] = $k->min_max;
            
            // Cari alternatif yang sesuai dengan kriteria ini
            $alternatif = Alternatif::where('kriteria_id', $k->id)->first();
            
            if ($alternatif) {
                $row['a1'] = $k->bobot * $alternatif->a1;
                $row['a2'] = $k->bobot * $alternatif->a2;
                $row['a3'] = $k->bobot * $alternatif->a3;
                $row['a4'] = $k->bobot * $alternatif->a4;
            } else {
                $row['a1'] = 0;
                $row['a2'] = 0;
                $row['a3'] = 0;
                $row['a4'] = 0;
            }
            
            $evaluasiMatrix[] = $row;
        }
        
        return view('evaluasi.index', compact('evaluasiMatrix'));
    }
}
