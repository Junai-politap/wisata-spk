<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Perhitungan extends Model
{
    protected $table = 'perhitungan';

    public function package(): BelongsTo
    {
        return $this->belongsTo(PaketWisata::class, 'id_paket_wisata');
    }
}
