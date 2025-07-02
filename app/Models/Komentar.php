<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Komentar extends Model
{
    protected $fillable = [
        'user_id',
        'destinasi_id',
        'isi',
        'tanggal',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function destinasi(): BelongsTo
    {
        return $this->belongsTo(Destinasi::class);
    }

    public function tulisKomentar()
    {
        $this->save();
    }

    public function hapusKomentar()
    {
        $this->delete();
    }
}
