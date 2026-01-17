<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Santri extends Authenticatable
{
    use HasFactory;

    // protected $table = 'santris';
    protected $guard = 'santri';

    protected $fillable = ['nama', 'nis', 'alamat', 'tanggal_lahir', 'kamar', 'bendahara_id', 'password', 'user_id'];
    protected $hidden = ['password'];

    public function bendahara()
    {
        return $this->belongsTo(Bendahara::class);
    }

    public function keuangans()
    {
        return $this->hasMany(Keuangan::class);
    }

    public function koperasiTransactions()
    {
        return $this->hasMany(KoperasiTransaction::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}



}
