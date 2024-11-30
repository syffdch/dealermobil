<?php

namespace App\Models;

use App\Models\Mobil;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DtMobil extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ms_mobil';
    protected $fillable = ['ms_mobil_id', 'seri_mobil', 'harga'];

    public function ms_mobil()
    {
        return $this->belongsTo(Mobil::class);
    }
}
