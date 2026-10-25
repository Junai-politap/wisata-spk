<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perhitungan;
use App\Services\TopsisService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class PerhitunganController extends Controller
{
    public function __construct(protected TopsisService $topsisService) {}

    // 1. Menampilkan Halaman Index
    public function index()
    {
        // Ambil data hasil perhitungan yang sudah diurutkan berdasarkan peringkat
        $list_perhitungan = Perhitungan::with('package')
            ->orderBy('peringkat', 'asc')
            ->paginate(9);

        return view('admin.perhitungan.index', compact('list_perhitungan'));
    }

    public function show(string $id)
    {
        $perhitungan = Perhitungan::with('package')->findOrFail($id);

        return view('admin.perhitungan.show', compact('perhitungan'));
    }

    public function reset(): RedirectResponse
    {
        Perhitungan::query()->delete();

        return redirect()->route('perhitungan.index')->with('success', 'Semua hasil perhitungan berhasil direset.');
    }

    // 2. Menjalankan Logika Perhitungan TOPSIS
    public function calculate()
    {
        try {
            // Jalankan logika dari Service
            $results = $this->topsisService->calculate();

            if (empty($results)) {
                return redirect()->back()->with('error', 'Data paket atau kriteria belum lengkap.');
            }

            DB::transaction(function () use ($results): void {
                Perhitungan::query()->delete();

                foreach ($results as $rank => $result) {
                    $perhitungan = new Perhitungan;
                    $perhitungan->id_paket_wisata = $result['id'];
                    $perhitungan->skor_topsis = $result['score'];
                    $perhitungan->peringkat = $rank + 1;
                    $perhitungan->save();
                }
            });

            return redirect('admin/perhitungan')->with('success', 'Perhitungan TOPSIS berhasil dilakukan!');

        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghitung: '.$e->getMessage());
        }
    }
}
