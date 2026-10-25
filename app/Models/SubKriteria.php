<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubKriteria extends Model
{
    protected $table = 'sub_kriteria';

    protected $fillable = [
        'kriteria_id',
        'nama',
        'nilai',
        'min_range',
        'max_range',
    ];

    /**
     * Get the criterion that owns this sub criterion.
     */
    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }

    /**
     * Get the formatted range according to the criteria type.
     */
    public function getRentangFormatAttribute(): string
    {
        $min = $this->min_range;
        $max = $this->max_range;

        if (is_null($min) && is_null($max)) {
            return '-';
        }

        $kriteria = $this->kriteria;
        $kode = strtoupper($kriteria?->kode ?? '');
        $namaKriteria = strtolower($kriteria?->nama_kriteria ?? '');

        // 1. Kriteria Harga (C1)
        if (str_contains($namaKriteria, 'harga') || $kode === 'C1') {
            if (! is_null($min) && ($min == 0 || $min == 1) && ! is_null($max)) {
                return '≤ Rp '.number_format((float) $max, 0, ',', '.');
            }
            if (! is_null($max) && $max >= 9000000) {
                return '≥ Rp '.number_format((float) $min, 0, ',', '.');
            }
            if (! is_null($min) && ! is_null($max)) {
                return 'Rp '.number_format((float) $min, 0, ',', '.').' - Rp '.number_format((float) $max, 0, ',', '.');
            }
            if (! is_null($min)) {
                return '≥ Rp '.number_format((float) $min, 0, ',', '.');
            }

            return '≤ Rp '.number_format((float) $max, 0, ',', '.');
        }

        // 2. Kriteria Rating (C2)
        if (str_contains($namaKriteria, 'rating') || $kode === 'C2') {
            if (! is_null($min) && ! is_null($max)) {
                if ((float) $min == (float) $max) {
                    return number_format((float) $min, 1).' Bintang';
                }
                if ((float) $min == 0) {
                    return '≤ '.number_format((float) $max, 1).' Bintang';
                }

                return number_format((float) $min, 1).' - '.number_format((float) $max, 1).' Bintang';
            }
            if (! is_null($min)) {
                return '≥ '.number_format((float) $min, 1).' Bintang';
            }

            return '≤ '.number_format((float) $max, 1).' Bintang';
        }

        // 3. Kriteria Durasi (C3)
        if (str_contains($namaKriteria, 'durasi') || $kode === 'C3') {
            if (! is_null($min) && ! is_null($max)) {
                if ((int) $min === (int) $max) {
                    return (int) $min.' Hari';
                }
                if ((int) $min <= 1 && (int) $max === 1) {
                    return '≤ 1 Hari';
                }
                if ((int) $max >= 10) {
                    return '≥ '.(int) $min.' Hari';
                }

                return (int) $min.' - '.(int) $max.' Hari';
            }
            if (! is_null($min)) {
                return '≥ '.(int) $min.' Hari';
            }

            return '≤ '.(int) $max.' Hari';
        }

        // 4. Kriteria Destinasi (C4)
        if (str_contains($namaKriteria, 'destinasi') || $kode === 'C4') {
            if (! is_null($min) && ! is_null($max)) {
                if ((int) $min === (int) $max) {
                    return (int) $min.' Destinasi';
                }
                if ((int) $min === 0) {
                    return '≤ '.(int) $max.' Destinasi';
                }
                if ((int) $max >= 20) {
                    return '≥ '.(int) $min.' Destinasi';
                }

                return (int) $min.' - '.(int) $max.' Destinasi';
            }
            if (! is_null($min)) {
                return '≥ '.(int) $min.' Destinasi';
            }

            return '≤ '.(int) $max.' Destinasi';
        }

        // Fallback untuk kriteria lainnya
        if (! is_null($min) && ! is_null($max)) {
            if ($min == $max) {
                return (string) (float) $min;
            }

            return (float) $min.' - '.(float) $max;
        }

        if (! is_null($min)) {
            return '≥ '.(float) $min;
        }

        return '≤ '.(float) $max;
    }
}
