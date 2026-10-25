<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Kriteria extends Model
{
    protected $table = 'kriteria';

    protected $fillable = [
        'kode',
        'nama_kriteria',
        'tipe_kriteria',
        'bobot',
    ];

    /**
     * Get sub criteria associated with this criterion.
     */
    public function subKriteria(): HasMany
    {
        return $this->hasMany(SubKriteria::class, 'kriteria_id');
    }
}
