<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaketWisata;
use Illuminate\Http\Request;

class PaketWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['list_paket_wisata'] = PaketWisata::all();

        return view('admin.paket-wisata.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.paket-wisata.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'latitude' => 'nullable|required_with:longitude|numeric|between:-90,90',
            'longitude' => 'nullable|required_with:latitude|numeric|between:-180,180',
            'harga' => 'required|numeric|min:0',
            'durasi_perjalanan' => 'required|integer|min:1',
            'jumlah_destinasi' => 'required|integer|min:1',
            'rating' => 'nullable|numeric|between:0,5',
            'deskripsi' => 'nullable|string',
            'poto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $paketwisata = new PaketWisata;
        $paketwisata->nama_paket = $request->nama_paket;
        $paketwisata->lokasi = $request->lokasi;
        $paketwisata->latitude = $request->input('latitude');
        $paketwisata->longitude = $request->input('longitude');
        $paketwisata->harga = $request->harga;
        $paketwisata->durasi_perjalanan = $request->durasi_perjalanan;
        $paketwisata->jumlah_destinasi = $request->jumlah_destinasi;
        $paketwisata->rating = $request->rating;
        $paketwisata->deskripsi = $request->deskripsi;
        $paketwisata->handleUploadPoto();
        $paketwisata->save();

        return redirect('admin/paket-wisata')->with('success', 'Paket wisata berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['paket_wisata'] = PaketWisata::findOrFail($id);

        return view('admin.paket-wisata.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['paket_wisata'] = PaketWisata::findOrFail($id);

        return view('admin.paket-wisata.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'latitude' => 'nullable|required_with:longitude|numeric|between:-90,90',
            'longitude' => 'nullable|required_with:latitude|numeric|between:-180,180',
            'harga' => 'required|numeric|min:0',
            'durasi_perjalanan' => 'required|integer|min:1',
            'jumlah_destinasi' => 'required|integer|min:1',
            'rating' => 'nullable|numeric|between:0,5',
            'deskripsi' => 'nullable|string',
            'poto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $paketwisata = PaketWisata::findOrFail($id);
        $paketwisata->nama_paket = $request->nama_paket;
        $paketwisata->lokasi = $request->lokasi;
        $paketwisata->latitude = $request->input('latitude');
        $paketwisata->longitude = $request->input('longitude');
        $paketwisata->harga = $request->harga;
        $paketwisata->durasi_perjalanan = $request->durasi_perjalanan;
        $paketwisata->jumlah_destinasi = $request->jumlah_destinasi;
        $paketwisata->rating = $request->rating;
        $paketwisata->deskripsi = $request->deskripsi;
        $paketwisata->handleUploadPoto();
        $paketwisata->save();

        return redirect('admin/paket-wisata')->with('success', 'Paket wisata berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paketwisata = PaketWisata::findOrFail($id);
        $paketwisata->handleDeletePoto();
        $paketwisata->delete();

        return redirect('admin/paket-wisata')->with('success', 'Paket wisata berhasil dihapus.');
    }
}
