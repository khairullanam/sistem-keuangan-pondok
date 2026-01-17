<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KoperasiTransactionDetail extends Model
{
      // Izinkan kolom untuk mass assignment
    protected $fillable = [
        'koperasi_transaction_id',
        'nama_barang',
        'jumlah',
        'harga_satuan',
        'jumlah_pembayaran',
    ];   
    // Relasi ke transaksi utama
    public function transaction()
    {
        return $this->belongsTo(KoperasiTransaction::class, 'koperasi_transaction_id');
    }

}
