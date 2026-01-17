<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $fillable = [
    'santri_id',
    'bendahara_id',
    'jenis_transaksi',
    'jumlah',
    'tanggal',
    'keterangan',
    'manual_override',
];

    public function santri()
{
    return $this->belongsTo(Santri::class);
}

public function bendahara()
{
    return $this->belongsTo(Bendahara::class);
}

}
