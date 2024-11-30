<?php

namespace App\Models;

use App\Models\Mobil;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipeMobil extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tipe_mobil';
    protected $fillable = ['tipe'];

    public function ms_mobil()
    {
        return $this->hasMany(Mobil::class);
    }
}
