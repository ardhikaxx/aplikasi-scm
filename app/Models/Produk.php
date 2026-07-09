<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'nama_produk',
        'id_kategori',
        'id_satuan',
        'harga_beli',
        'harga_jual',
        'stok',
        'reorder_point',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriProduk::class, 'id_kategori', 'id_kategori');
    }

    public function satuan()
    {
        return $this->belongsTo(SatuanUkur::class, 'id_satuan', 'id_satuan');
    }

    public function detailPenerimaans()
    {
        return $this->hasMany(DetailPenerimaan::class, 'id_produk', 'id_produk');
    }
}
