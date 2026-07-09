<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPenerimaan extends Model
{
    protected $table = 'detail_penerimaan';
    protected $primaryKey = 'id_detail';

    protected $fillable = [
        'id_penerimaan',
        'id_produk',
        'jumlah',
        'harga',
        'subtotal',
    ];

    public function penerimaanBarang()
    {
        return $this->belongsTo(PenerimaanBarang::class, 'id_penerimaan', 'id_penerimaan');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}
