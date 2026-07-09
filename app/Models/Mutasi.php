<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    protected $table = 'mutasi';
    protected $primaryKey = 'id_mutasi';

    protected $fillable = [
        'tanggal',
        'nama_produk',
        'jenis_mutasi',
        'jumlah',
        'keterangan',
    ];
}
