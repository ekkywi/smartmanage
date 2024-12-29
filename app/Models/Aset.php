<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_aset',
        'nama',
        'jenis',
        'merk',
        'tipe',
        'tahun_beli',
        'nilai_beli',
        'keterangan'
    ];
}
