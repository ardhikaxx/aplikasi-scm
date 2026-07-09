<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenerimaanBarang extends Model
{
    protected $table = 'penerimaan_barang';
    protected $primaryKey = 'id_penerimaan';

    protected $fillable = [
        'id_po',
        'tanggal',
        'keterangan',
    ];

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class, 'id_po', 'id_po');
    }

    public function detailPenerimaans()
    {
        return $this->hasMany(DetailPenerimaan::class, 'id_penerimaan', 'id_penerimaan');
    }
}
