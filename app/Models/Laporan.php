<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = ['periode', 'total_transaksi', 'total_pemasukan'];

    public function eksporPDF()
    {
        // Logika export PDF, bisa pakai DomPDF / Laravel Snappy / dll.
    }
}