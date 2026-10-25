<?php

namespace App\Models;

use Illuminate\Support\Str;

class Pengguna extends ModelAuthenticate
{
    protected $table = 'pengguna';

    /**
     * Delete user photo from storage if exists.
     */
    public function handleDeletePoto(): void
    {
        $poto = $this->poto;
        if ($poto && file_exists(public_path($poto))) {
            unlink(public_path($poto));
        }
    }

    /**
     * Upload user photo and delete old photo if exists.
     */
    public function handleUploadPoto(): void
    {
        if (request()->hasFile('poto')) {
            $poto = request()->file('poto');
            $destination = 'pengguna';
            $randomStr = Str::random(5);
            $filename = time().'-'.$randomStr.'.'.$poto->extension();
            $url = $poto->storeAs($destination, $filename);

            $this->handleDeletePoto();
            $this->poto = 'app/'.$url;
        }
    }
}
