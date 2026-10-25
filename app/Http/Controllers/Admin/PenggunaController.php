<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['list_pengguna'] = Pengguna::all();

        return view('admin.pengguna.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pengguna' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:pengguna,email',
            'password' => 'required|string|min:6|max:255',
            'alamat' => 'nullable|string|max:255',
            'no_telp' => 'nullable|string|max:255',
            'poto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $pengguna = new Pengguna;
        $pengguna->nama_pengguna = $request->nama_pengguna;
        $pengguna->email = $request->email;
        $pengguna->password = $request->password;
        $pengguna->alamat = $request->alamat;
        $pengguna->no_telp = $request->no_telp;
        $pengguna->handleUploadPoto();
        $pengguna->save();

        return redirect('admin/pengguna')->with('success', 'Data pengguna berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['pengguna'] = Pengguna::findOrFail($id);

        return view('admin.pengguna.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['pengguna'] = Pengguna::findOrFail($id);

        return view('admin.pengguna.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pengguna' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:pengguna,email,'.$id.',id',
            'password' => 'nullable|string|min:6|max:255',
            'alamat' => 'nullable|string|max:255',
            'no_telp' => 'nullable|string|max:255',
            'poto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $pengguna = Pengguna::findOrFail($id);
        $pengguna->nama_pengguna = $request->nama_pengguna;
        $pengguna->email = $request->email;
        if ($request->filled('password')) {
            $pengguna->password = $request->password;
        }
        $pengguna->alamat = $request->alamat;
        $pengguna->no_telp = $request->no_telp;
        $pengguna->handleUploadPoto();
        $pengguna->save();

        return redirect('admin/pengguna')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->handleDeletePoto();
        $pengguna->delete();

        return redirect('admin/pengguna')->with('success', 'Data pengguna berhasil dihapus.');
    }
}
