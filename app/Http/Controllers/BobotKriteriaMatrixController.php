<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BobotKriteriaMatrixController extends Controller
{
    public function index()
    {
        // Data contoh untuk preferensiMatrix
        $preferensiMatrix = [
            ['kombinasi' => 'A1-A2', 'f1' => 1, 'f2' => 1, 'f3' => 0, 'f4' => 0, 'f5' => 1, 'hd' => 3],
            ['kombinasi' => 'A1-A3', 'f1' => 1, 'f2' => 0, 'f3' => 1, 'f4' => 0, 'f5' => 0, 'hd' => 2],
            ['kombinasi' => 'A1-A4', 'f1' => 0, 'f2' => 0, 'f3' => 0, 'f4' => 0, 'f5' => 0, 'hd' => 0],
            ['kombinasi' => 'A2-A1', 'f1' => 0, 'f2' => 1, 'f3' => 1, 'f4' => 1, 'f5' => 1, 'hd' => 4],
            ['kombinasi' => 'A2-A3', 'f1' => 1, 'f2' => 0, 'f3' => 1, 'f4' => 0, 'f5' => 0, 'hd' => 2],
            ['kombinasi' => 'A2-A4', 'f1' => 0, 'f2' => 0, 'f3' => 0, 'f4' => 0, 'f5' => 0, 'hd' => 0],
            ['kombinasi' => 'A3-A1', 'f1' => 0, 'f2' => 1, 'f3' => 0, 'f4' => 1, 'f5' => 1, 'hd' => 3],
            ['kombinasi' => 'A3-A2', 'f1' => 1, 'f2' => 1, 'f3' => 0, 'f4' => 1, 'f5' => 1, 'hd' => 4],
            ['kombinasi' => 'A3-A4', 'f1' => 0, 'f2' => 0, 'f3' => 0, 'f4' => 1, 'f5' => 0, 'hd' => 1],
            ['kombinasi' => 'A4-A1', 'f1' => 1, 'f2' => 1, 'f3' => 1, 'f4' => 1, 'f5' => 1, 'hd' => 5],
            ['kombinasi' => 'A4-A2', 'f1' => 1, 'f2' => 1, 'f3' => 1, 'f4' => 1, 'f5' => 1, 'hd' => 5],
            ['kombinasi' => 'A4-A3', 'f1' => 1, 'f2' => 1, 'f3' => 1, 'f4' => 1, 'f5' => 1, 'hd' => 5],
        ];

        // Inisialisasi matrix bobot
        $alternatives = ['A1', 'A2', 'A3', 'A4'];
        $matrixBobot = array_fill_keys($alternatives, array_fill_keys($alternatives, 0));

        // Hitung bobot kriteria dan isi matrix
        foreach ($preferensiMatrix as $item) {
            list($a1, $a2) = explode('-', $item['kombinasi']);
            $bobot = ($item['hd'] / 5); // Misalkan jumlah kriteria adalah 5
            $matrixBobot[$a1][$a2] = $bobot;
        }

        // Hitung Leaving Flow dan Entering Flow
        $leavingFlow = array_fill_keys($alternatives, 0);
        $enteringFlow = array_fill_keys($alternatives, 0);
        $numCriteria = 5; // Jumlah kriteria

        foreach ($alternatives as $alt1) {
            $sum = 0;
            foreach ($alternatives as $alt2) {
                if ($alt1 !== $alt2) {
                    $sum += $matrixBobot[$alt1][$alt2];
                }
            }
            $leavingFlow[$alt1] = (1 / ($numCriteria - 1)) * $sum;
        }

        foreach ($alternatives as $alt1) {
            $sum = 0;
            foreach ($alternatives as $alt2) {
                if ($alt1 !== $alt2) {
                    $sum += $matrixBobot[$alt2][$alt1];
                }
            }
            $enteringFlow[$alt1] = (1 / ($numCriteria - 1)) * $sum;
        }

        // Hitung Net Flow
        $netFlow = [];
        foreach ($alternatives as $alt) {
            $netFlow[$alt] = $leavingFlow[$alt] - $enteringFlow[$alt];
        }

        arsort($netFlow); // Mengurutkan dalam urutan menurun

        return view('bobot_kriteria_matrix.index', compact('matrixBobot', 'alternatives', 'leavingFlow', 'enteringFlow', 'netFlow'));
    }
}
