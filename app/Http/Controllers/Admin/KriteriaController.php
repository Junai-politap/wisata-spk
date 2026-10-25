<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['list_kriteria'] = Kriteria::orderBy('kode', 'asc')->get();

        return view('admin.kriteria.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:10',
            'nama_kriteria' => 'required|string|max:255',
            'tipe_kriteria' => 'required|in:Benefit,Cost',
            'bobot' => 'required|numeric|min:0|max:100',
        ]);

        $kriteria = new Kriteria;
        $kriteria->kode = strtoupper($request->kode);
        $kriteria->nama_kriteria = $request->nama_kriteria;
        $kriteria->tipe_kriteria = $request->tipe_kriteria;
        $kriteria->bobot = $request->bobot;
        $kriteria->save();

        return redirect('admin/kriteria')->with('success', 'Data kriteria berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['kriteria'] = Kriteria::findOrFail($id);

        return view('admin.kriteria.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['kriteria'] = Kriteria::findOrFail($id);

        return view('admin.kriteria.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode' => 'required|string|max:10',
            'nama_kriteria' => 'required|string|max:255',
            'tipe_kriteria' => 'required|in:Benefit,Cost',
            'bobot' => 'required|numeric|min:0|max:100',
        ]);

        $kriteria = Kriteria::findOrFail($id);
        $kriteria->kode = strtoupper($request->kode);
        $kriteria->nama_kriteria = $request->nama_kriteria;
        $kriteria->tipe_kriteria = $request->tipe_kriteria;
        $kriteria->bobot = $request->bobot;
        $kriteria->save();

        return redirect('admin/kriteria')->with('success', 'Data kriteria berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();

        return redirect('admin/kriteria')->with('success', 'Data kriteria berhasil dihapus.');
    }
}
