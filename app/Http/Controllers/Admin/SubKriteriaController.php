<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['list_sub_kriteria'] = SubKriteria::with('kriteria')
            ->join('kriteria', 'sub_kriteria.kriteria_id', '=', 'kriteria.id')
            ->orderBy('kriteria.kode', 'asc')
            ->orderBy('sub_kriteria.nilai', 'asc')
            ->select('sub_kriteria.*')
            ->get();

        return view('admin.sub-kriteria.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_kriteria'] = Kriteria::orderBy('kode', 'asc')->get();

        return view('admin.sub-kriteria.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kriteria_id' => 'required|exists:kriteria,id',
            'nama' => 'required|string|max:100',
            'nilai' => 'required|integer',
            'min_range' => 'nullable|numeric',
            'max_range' => 'nullable|numeric',
        ]);

        $subKriteria = new SubKriteria;
        $subKriteria->kriteria_id = $request->kriteria_id;
        $subKriteria->nama = $request->nama;
        $subKriteria->nilai = $request->nilai;
        $subKriteria->min_range = $request->min_range;
        $subKriteria->max_range = $request->max_range;
        $subKriteria->save();

        return redirect('admin/sub-kriteria')->with('success', 'Data sub kriteria berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['sub_kriteria'] = SubKriteria::with('kriteria')->findOrFail($id);

        return view('admin.sub-kriteria.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['sub_kriteria'] = SubKriteria::findOrFail($id);
        $data['list_kriteria'] = Kriteria::orderBy('kode', 'asc')->get();

        return view('admin.sub-kriteria.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kriteria_id' => 'required|exists:kriteria,id',
            'nama' => 'required|string|max:100',
            'nilai' => 'required|integer',
            'min_range' => 'nullable|numeric',
            'max_range' => 'nullable|numeric',
        ]);

        $subKriteria = SubKriteria::findOrFail($id);
        $subKriteria->kriteria_id = $request->kriteria_id;
        $subKriteria->nama = $request->nama;
        $subKriteria->nilai = $request->nilai;
        $subKriteria->min_range = $request->min_range;
        $subKriteria->max_range = $request->max_range;
        $subKriteria->save();

        return redirect('admin/sub-kriteria')->with('success', 'Data sub kriteria berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subKriteria = SubKriteria::findOrFail($id);
        $subKriteria->delete();

        return redirect('admin/sub-kriteria')->with('success', 'Data sub kriteria berhasil dihapus.');
    }
}
