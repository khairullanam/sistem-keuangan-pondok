<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bendahara extends Model
{
    public function santris()
{
    return $this->hasMany(Santri::class);
}

public function keuangans()
{
    return $this->hasMany(Keuangan::class);
}

}
