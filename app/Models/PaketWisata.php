<?php

namespace App\Models;

use Illuminate\Support\Str;

class PaketWisata extends Model
{
    protected $table = 'paket_wisata';

    public function Perhitungan()
    {
        return $this->hasMany(Perhitungan::class, 'id_paket_wisata');
    }

    /**
     * Delete the package photo file from disk if it exists.
     */
    public function handleDeletePoto(): void
    {
        $poto = $this->poto;
        if ($poto && file_exists(public_path($poto))) {
            unlink(public_path($poto));
        }
    }

    /**
     * Upload a new photo and delete the old photo if present.
     */
    public function handleUploadPoto(): void
    {
        if (request()->hasFile('poto')) {
            $poto = request()->file('poto');
            $destination = 'paket-wisata';
            $randomStr = Str::random(5);
            $filename = time().'-'.$randomStr.'.'.$poto->extension();
            $url = $poto->storeAs($destination, $filename);

            $this->handleDeletePoto();
            $this->poto = 'app/'.$url;
        }
    }
}
