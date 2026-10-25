<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class TopsisService
{
    private const DISTANCE_WEIGHT = 0.25;

    public function calculate(): array
    {
        return $this->calculateRankings();
    }

    public function calculateForLocation(float $latitude, float $longitude): array
    {
        return $this->calculateRankings($latitude, $longitude);
    }

    public function calculateForArea(float $latitude, float $longitude, string $area): array
    {
        return $this->calculateRankings($latitude, $longitude, $area);
    }

    private function calculateRankings(
        ?float $userLatitude = null,
        ?float $userLongitude = null,
        ?string $area = null,
    ): array {
        $criteria = DB::table('kriteria')->orderBy('id')->get();

        if ($criteria->isEmpty()) {
            return [];
        }

        $usesLocation = $userLatitude !== null && $userLongitude !== null;
        $packagesQuery = DB::table('paket_wisata');

        if ($usesLocation) {
            $packagesQuery->whereNotNull('latitude')
                ->whereNotNull('longitude');

            if ($area !== null) {
                $packagesQuery->where('lokasi', $area);
            }

            foreach ($criteria as $criterion) {
                $criterion->bobot = (float) $criterion->bobot * (1 - self::DISTANCE_WEIGHT);
            }

            $criteria->push((object) [
                'kode' => 'DISTANCE',
                'bobot' => self::DISTANCE_WEIGHT,
                'tipe_kriteria' => 'Cost',
            ]);
        }

        $packages = $packagesQuery->get();

        if ($packages->isEmpty()) {
            return [];
        }

        $matrix = [];

        foreach ($packages as $package) {
            $distance = $usesLocation
                ? $this->distanceInKilometers(
                    $userLatitude,
                    $userLongitude,
                    (float) $package->latitude,
                    (float) $package->longitude,
                )
                : null;

            $values = [];

            foreach ($criteria as $criterion) {
                $value = match ($criterion->kode) {
                    'C1' => (float) $package->harga,
                    'C2' => (float) $package->rating,
                    'C3' => (float) $package->durasi_perjalanan,
                    'C4' => (float) $package->jumlah_destinasi,
                    'DISTANCE' => $distance,
                    default => 0.0,
                };

                $values[] = (float) $value;
            }

            $matrix[] = [
                'id' => $package->id,
                'values' => $values,
                'distance_km' => $distance,
            ];
        }

        $numberOfPackages = count($matrix);
        $numberOfCriteria = count($criteria);
        $denominators = [];

        for ($criterionIndex = 0; $criterionIndex < $numberOfCriteria; $criterionIndex++) {
            $sumOfSquares = 0;

            for ($packageIndex = 0; $packageIndex < $numberOfPackages; $packageIndex++) {
                $sumOfSquares += $matrix[$packageIndex]['values'][$criterionIndex] ** 2;
            }

            $denominators[] = sqrt($sumOfSquares);
        }

        $weightedMatrix = [];

        foreach ($matrix as $package) {
            $weightedValues = [];

            for ($criterionIndex = 0; $criterionIndex < $numberOfCriteria; $criterionIndex++) {
                $denominator = $denominators[$criterionIndex];
                $normalizedValue = $denominator === 0.0
                    ? 0.0
                    : $package['values'][$criterionIndex] / $denominator;

                $weightedValues[] = $normalizedValue * (float) $criteria[$criterionIndex]->bobot;
            }

            $weightedMatrix[] = [
                'id' => $package['id'],
                'values' => $weightedValues,
                'distance_km' => $package['distance_km'],
            ];
        }

        $idealPositive = [];
        $idealNegative = [];

        for ($criterionIndex = 0; $criterionIndex < $numberOfCriteria; $criterionIndex++) {
            $columnValues = array_column(
                array_map(fn (array $package): array => $package['values'], $weightedMatrix),
                $criterionIndex,
            );
            $criterionType = strtolower($criteria[$criterionIndex]->tipe_kriteria);

            if ($criterionType === 'benefit') {
                $idealPositive[] = max($columnValues);
                $idealNegative[] = min($columnValues);
            } else {
                $idealPositive[] = min($columnValues);
                $idealNegative[] = max($columnValues);
            }
        }

        $results = [];

        foreach ($weightedMatrix as $package) {
            $distanceToPositive = 0;
            $distanceToNegative = 0;

            for ($criterionIndex = 0; $criterionIndex < $numberOfCriteria; $criterionIndex++) {
                $distanceToPositive += ($package['values'][$criterionIndex] - $idealPositive[$criterionIndex]) ** 2;
                $distanceToNegative += ($package['values'][$criterionIndex] - $idealNegative[$criterionIndex]) ** 2;
            }

            $distanceToPositive = sqrt($distanceToPositive);
            $distanceToNegative = sqrt($distanceToNegative);
            $score = ($distanceToPositive + $distanceToNegative) === 0.0
                ? 0.0
                : $distanceToNegative / ($distanceToPositive + $distanceToNegative);

            $results[] = [
                'id' => $package['id'],
                'score' => round($score, 4),
                'distance_km' => $package['distance_km'] === null
                    ? null
                    : round($package['distance_km'], 1),
            ];
        }

        usort($results, fn (array $left, array $right): int => $right['score'] <=> $left['score']);

        return $results;
    }

    private function distanceInKilometers(
        float $startLatitude,
        float $startLongitude,
        float $endLatitude,
        float $endLongitude,
    ): float {
        $latitudeDifference = deg2rad($endLatitude - $startLatitude);
        $longitudeDifference = deg2rad($endLongitude - $startLongitude);
        $haversine = sin($latitudeDifference / 2) ** 2
            + cos(deg2rad($startLatitude))
            * cos(deg2rad($endLatitude))
            * sin($longitudeDifference / 2) ** 2;
        $haversine = min(1, max(0, $haversine));

        return 6371 * 2 * atan2(sqrt($haversine), sqrt(1 - $haversine));
    }
}
