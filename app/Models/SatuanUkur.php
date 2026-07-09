<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SatuanUkur extends Model
{
    protected $table = 'satuan_ukur';
    protected $primaryKey = 'id_satuan';

    protected $fillable = [
        'nama_satuan',
    ];

    public function produks()
    {
        return $this->hasMany(Produk::class, 'id_satuan', 'id_satuan');
    }
}
