<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        return view('kriteria.index', compact('kriteria'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $kriteria = new Kriteria;
        $kriteria->kriteria = $request->kriteria;
        $kriteria->fungsi_preferensi = $request->fungsi_preferensi;
        $kriteria->min_max = $request->min_max;
        $kriteria->bobot = $request->bobot;
        $kriteria->save();

        return redirect()->route('kriteria.index');
    }

    public function edit($id)
    {
        $kriteria = Kriteria::find($id);
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->kriteria = $request->kriteria;
        $kriteria->fungsi_preferensi = $request->fungsi_preferensi;
        $kriteria->min_max = $request->min_max;
        $kriteria->bobot = $request->bobot;
        $kriteria->save();

        return redirect()->route('kriteria.index');
    }

    public function destroy($id)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->delete();

        return redirect()->route('kriteria.index');
    }
}
