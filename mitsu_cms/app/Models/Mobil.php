<?php

namespace App\Models;

use App\Models\DtMobil;
use App\Models\TipeMobil;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mobil extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'ms_mobil';
    protected $fillable = ['nama_mobil', 'tipe_mobil_id', 'transmisi', 'mesin', 'bahan_bakar', 'kursi', 'gambar', 'slug'];

    public function tipe_mobil()
    {
        return $this->belongsTo(TipeMobil::class);
    }

    public function dt_mobil()
    {
        return $this->hasMany(DtMobil::class);
    }
}
