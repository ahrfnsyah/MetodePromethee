<?php
// app/Http/Controllers/BobotKriteriaController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BobotKriteriaController extends Controller
{
    public function index()
    {
        // Data contoh untuk preferensiMatrix
        $preferensiMatrix = [
            ['kombinasi' => 'A1-A2', 'f1' => 1, 'f2' => 1, 'f3' => 0, 'f4' => 0, 'f5' => 1],
            ['kombinasi' => 'A1-A3', 'f1' => 1, 'f2' => 0, 'f3' => 1, 'f4' => 0, 'f5' => 0],
            ['kombinasi' => 'A1-A4', 'f1' => 0, 'f2' => 0, 'f3' => 0, 'f4' => 0, 'f5' => 0],
            ['kombinasi' => 'A2-A1', 'f1' => 0, 'f2' => 1, 'f3' => 1, 'f4' => 1, 'f5' => 1],
            ['kombinasi' => 'A2-A3', 'f1' => 1, 'f2' => 0, 'f3' => 1, 'f4' => 0, 'f5' => 0],
            ['kombinasi' => 'A2-A4', 'f1' => 0, 'f2' => 0, 'f3' => 0, 'f4' => 0, 'f5' => 0],
            ['kombinasi' => 'A3-A1', 'f1' => 0, 'f2' => 1, 'f3' => 0, 'f4' => 1, 'f5' => 1],
            ['kombinasi' => 'A3-A2', 'f1' => 1, 'f2' => 1, 'f3' => 0, 'f4' => 1, 'f5' => 1],
            ['kombinasi' => 'A3-A4', 'f1' => 0, 'f2' => 0, 'f3' => 0, 'f4' => 1, 'f5' => 0],
            ['kombinasi' => 'A4-A1', 'f1' => 1, 'f2' => 1, 'f3' => 1, 'f4' => 1, 'f5' => 1],
            ['kombinasi' => 'A4-A2', 'f1' => 1, 'f2' => 1, 'f3' => 1, 'f4' => 1, 'f5' => 1],
            ['kombinasi' => 'A4-A3', 'f1' => 1, 'f2' => 1, 'f3' => 1, 'f4' => 1, 'f5' => 1],
        ];

        // Hitung nilai HD untuk setiap kombinasi
        foreach ($preferensiMatrix as &$row) {
            $row['hd'] = $row['f1'] + $row['f2'] + $row['f3'] + $row['f4'] + $row['f5'];
        }

        return view('bobot_kriteria.index', compact('preferensiMatrix'));
    }
}
