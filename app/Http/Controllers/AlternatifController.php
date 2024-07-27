<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatif = Alternatif::with('kriteria')->get();
        return view('alternatif.index', compact('alternatif'));
    }

    public function create()
    {
        $kriteria = Kriteria::all();
        return view('alternatif.create', compact('kriteria'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kriteria_id' => 'required|exists:kriteria,id',
            'a1' => 'required|numeric',
            'a2' => 'required|numeric',
            'a3' => 'required|numeric',
            'a4' => 'required|numeric',
        ]);

        $alternatif = new Alternatif;
        $alternatif->kriteria_id = $request->kriteria_id;
        $alternatif->a1 = $request->a1;
        $alternatif->a2 = $request->a2;
        $alternatif->a3 = $request->a3;
        $alternatif->a4 = $request->a4;
        $alternatif->save();

        return redirect()->route('alternatif.index');
    }

    public function edit($id)
    {
        $alternatif = Alternatif::find($id);
        $kriteria = Kriteria::all();
        return view('alternatif.edit', compact('alternatif', 'kriteria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kriteria_id' => 'required|exists:kriteria,id',
            'a1' => 'required|numeric',
            'a2' => 'required|numeric',
            'a3' => 'required|numeric',
            'a4' => 'required|numeric',
        ]);

        $alternatif = Alternatif::find($id);
        $alternatif->kriteria_id = $request->kriteria_id;
        $alternatif->a1 = $request->a1;
        $alternatif->a2 = $request->a2;
        $alternatif->a3 = $request->a3;
        $alternatif->a4 = $request->a4;
        $alternatif->save();

        return redirect()->route('alternatif.index');
    }

    public function destroy($id)
    {
        $alternatif = Alternatif::find($id);
        $alternatif->delete();

        return redirect()->route('alternatif.index');
    }
    public function evaluasi()
    {
        $kriterias = Kriteria::all();
        $alternatifs = Alternatif::all();

        $evaluasiMatrix = [];

        foreach ($kriterias as $kriteria) {
            $evaluasiRow = [
                'kriteria' => $kriteria->kriteria,
                'min_max' => $kriteria->min_max,
                'a1' => $kriteria->bobot * $alternatifs->where('kriteria_id', $kriteria->id)->first()->a1,
                'a2' => $kriteria->bobot * $alternatifs->where('kriteria_id', $kriteria->id)->first()->a2,
                'a3' => $kriteria->bobot * $alternatifs->where('kriteria_id', $kriteria->id)->first()->a3,
                'a4' => $kriteria->bobot * $alternatifs->where('kriteria_id', $kriteria->id)->first()->a4,
            ];
            $evaluasiMatrix[] = $evaluasiRow;
        }

        return view('alternatif.evaluasi', compact('evaluasiMatrix'));
    }
    
}
