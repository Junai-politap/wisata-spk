<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\PaketWisata;
use App\Models\Pengguna;
use App\Models\SubKriteria;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['total_paket_wisata'] = PaketWisata::count();
        $data['total_pengguna'] = Pengguna::count();
        $data['total_kriteria'] = Kriteria::count();
        $data['total_sub_kriteria'] = SubKriteria::count();
        $data['paket_terbaru'] = PaketWisata::orderBy('created_at', 'desc')->limit(5)->get();
        $data['pengguna_terbaru'] = Pengguna::orderBy('created_at', 'desc')->limit(5)->get();

        return view('admin.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
