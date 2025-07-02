<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    protected $fillable = [
        'nama',
        'lokasi',
        'deskripsi',
        'foto',
    ];
    public function tiket()
    {
    return $this->hasMany(Tiket::class);
    }

    public function komentars()
    {
    return $this->hasMany(Komentar::class);
    }

}