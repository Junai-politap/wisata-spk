<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PaketWisata;
use App\Models\Perhitungan;
use App\Services\TopsisService;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(private TopsisService $topsisService) {}

    public function index(Request $request): View
    {
        $validated = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
        ]);
        $search = trim($validated['q'] ?? '');

        $packages = PaketWisata::query()
            ->when($search !== '', function (Builder $query) use ($search): void {
                $query->where(function (Builder $query) use ($search): void {
                    $query->where('nama_paket', 'like', "%{$search}%")
                        ->orWhere('lokasi', 'like', "%{$search}%");
                });
            })
            ->orderBy('nama_paket')
            ->paginate(6)
            ->withQueryString();

        $recommendations = Perhitungan::query()
            ->with('package')
            ->whereHas('package')
            ->orderBy('peringkat')
            ->limit(3)
            ->get();

        $nearbyAreas = PaketWisata::query()
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->select('lokasi')
            ->distinct()
            ->orderBy('lokasi')
            ->pluck('lokasi');

        return view('user.index', compact('packages', 'recommendations', 'search', 'nearbyAreas'));
    }

    public function show(string $id): View
    {
        $package = PaketWisata::findOrFail($id);
        $recommendation = Perhitungan::query()
            ->where('id_paket_wisata', $package->id)
            ->first();

        return view('user.show', compact('package', 'recommendation'));
    }

    public function nearby(Request $request): JsonResponse
    {
        $area = null;

        if ($request->filled('area')) {
            $validated = $request->validate([
                'area' => ['required', 'string', 'max:255', 'exists:paket_wisata,lokasi'],
            ]);
            $area = trim($validated['area']);

            $areaCenter = PaketWisata::query()
                ->where('lokasi', $area)
                ->whereNotNull('latitude')
                ->whereNotNull('longitude')
                ->selectRaw('AVG(latitude) as latitude, AVG(longitude) as longitude')
                ->first();

            if (! $areaCenter) {
                return response()->json([
                    'message' => 'Daerah tersebut belum memiliki paket dengan koordinat.',
                ], 422);
            }

            $latitude = (float) $areaCenter->latitude;
            $longitude = (float) $areaCenter->longitude;
        } else {
            $validated = $request->validate([
                'latitude' => ['required', 'numeric', 'between:-90,90'],
                'longitude' => ['required', 'numeric', 'between:-180,180'],
            ]);

            $latitude = (float) $validated['latitude'];
            $longitude = (float) $validated['longitude'];
        }

        $rankedPackages = $area !== null
            ? $this->topsisService->calculateForArea($latitude, $longitude, $area)
            : $this->topsisService->calculateForLocation($latitude, $longitude);

        if ($rankedPackages === []) {
            return response()->json([]);
        }

        $packagesById = PaketWisata::query()
            ->whereIn('id', array_column($rankedPackages, 'id'))
            ->get()
            ->keyBy('id');
        $results = [];

        foreach (array_slice($rankedPackages, 0, 6) as $index => $rankedPackage) {
            $package = $packagesById->get($rankedPackage['id']);

            if (! $package) {
                continue;
            }

            $results[] = [
                'id' => $package->id,
                'nama_paket' => $package->nama_paket,
                'lokasi' => $package->lokasi,
                'harga' => $package->harga,
                'rating' => $package->rating,
                'durasi_perjalanan' => $package->durasi_perjalanan,
                'jumlah_destinasi' => $package->jumlah_destinasi,
                'peringkat' => $index + 1,
                'score' => $rankedPackage['score'],
                'distance_km' => $rankedPackage['distance_km'],
                'image_url' => $package->poto ? url('public/'.$package->poto) : null,
                'detail_url' => route('user.packages.show', $package),
            ];
        }

        return response()->json($results);
    }
}
