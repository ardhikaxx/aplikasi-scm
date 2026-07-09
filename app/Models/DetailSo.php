<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailSo extends Model
{
    protected $table = 'detail_so';
    protected $primaryKey = 'id_detail';

    protected $fillable = [
        'id_so',
        'nama_produk',
        'jumlah',
    ];

    public function salesOrder()
    {
        return $this->belongsTo(SalesOrder::class, 'id_so', 'id_so');
    }
}
