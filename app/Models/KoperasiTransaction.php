<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KoperasiTransaction extends Model
{
     protected $fillable = [
        'santri_id',
        'jenis_transaksi',
        'jumlah_pembayaran',
        
    ];

   public function santri()
{
    return $this->belongsTo(Santri::class);
}

public function details()
{
    return $this->hasMany(KoperasiTransactionDetail::class);
}

}
