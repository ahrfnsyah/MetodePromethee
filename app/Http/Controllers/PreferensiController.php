<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Alternatif;

class PreferensiController extends Controller
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
        
        // Hitung nilai preferensi
        $preferensiMatrix = [];
        
        foreach ($evaluasiMatrix as $row) {
            $d_a1_a2 = $row['a1'] - $row['a2'];
            $d_a1_a3 = $row['a1'] - $row['a3'];
            $d_a1_a4 = $row['a1'] - $row['a4'];

            $d_a2_a1 = $row['a2'] - $row['a1'];
            $d_a2_a3 = $row['a2'] - $row['a3'];
            $d_a2_a4 = $row['a2'] - $row['a4'];

            $d_a3_a1 = $row['a3'] - $row['a1'];
            $d_a3_a2 = $row['a3'] - $row['a2'];
            $d_a3_a4 = $row['a3'] - $row['a4'];

            $d_a4_a1 = $row['a4'] - $row['a1'];
            $d_a4_a2 = $row['a4'] - $row['a2'];
            $d_a4_a3 = $row['a4'] - $row['a3'];

            $h_d_a1_a2 = $d_a1_a2 >= 0 ? 1 : 0;
            $h_d_a1_a3 = $d_a1_a3 >= 0 ? 1 : 0;
            $h_d_a1_a4 = $d_a1_a4 >= 0 ? 1 : 0;

            $h_d_a2_a1 = $d_a2_a1 >= 0 ? 1 : 0;
            $h_d_a2_a3 = $d_a2_a3 >= 0 ? 1 : 0;
            $h_d_a2_a4 = $d_a2_a4 >= 0 ? 1 : 0;

            $h_d_a3_a1 = $d_a3_a1 >= 0 ? 1 : 0;
            $h_d_a3_a2 = $d_a3_a2 >= 0 ? 1 : 0;
            $h_d_a3_a4 = $d_a3_a4 >= 0 ? 1 : 0;

            $h_d_a4_a1 = $d_a4_a1 >= 0 ? 1 : 0;
            $h_d_a4_a2 = $d_a4_a2 >= 0 ? 1 : 0;
            $h_d_a4_a3 = $d_a4_a3 >= 0 ? 1 : 0;

            $preferensiMatrix[] = [
                'kriteria' => $row['kriteria'],
                'd_a1_a2' => $d_a1_a2,
                'd_a1_a3' => $d_a1_a3,
                'd_a1_a4' => $d_a1_a4,

                'd_a2_a1' => $d_a2_a1,
                'd_a2_a3' => $d_a2_a3,
                'd_a2_a4' => $d_a2_a4,

                'd_a3_a1' => $d_a3_a1,
                'd_a3_a2' => $d_a3_a2,
                'd_a3_a4' => $d_a3_a4,

                'd_a4_a1' => $d_a4_a1,
                'd_a4_a2' => $d_a4_a2,
                'd_a4_a3' => $d_a4_a3,

                'h_d_a1_a2' => $h_d_a1_a2,
                'h_d_a1_a3' => $h_d_a1_a3,
                'h_d_a1_a4' => $h_d_a1_a4,

                'h_d_a2_a1' => $h_d_a2_a1,
                'h_d_a2_a3' => $h_d_a2_a3,
                'h_d_a2_a4' => $h_d_a2_a4,

                'h_d_a3_a1' => $h_d_a3_a1,
                'h_d_a3_a2' => $h_d_a3_a2,
                'h_d_a3_a4' => $h_d_a3_a4,

                'h_d_a4_a1' => $h_d_a4_a1,
                'h_d_a4_a2' => $h_d_a4_a2,
                'h_d_a4_a3' => $h_d_a4_a3,
            ];
        }
        
 


        return view('preferensi.index', compact('evaluasiMatrix', 'preferensiMatrix',));
    }
}

