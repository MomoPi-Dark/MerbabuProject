<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // ← ini penting!
use App\Models\User;
use App\Models\Destinasi;

class Tiket extends Model
{
    protected $fillable = [
        'user_id',
        'destinasi_id',
        'tanggal',
        'jumlah',
        'harga',
        'status',
        'qr_code',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function destinasi(): BelongsTo
    {
        return $this->belongsTo(Destinasi::class);
    }

    public function pesanTiket()
    {
    $this->status = 'menunggu';
    $this->save();
    }

    public function bayarTiket()
    {
    $this->status = 'dibayar';
    $this->save();
    }
}
