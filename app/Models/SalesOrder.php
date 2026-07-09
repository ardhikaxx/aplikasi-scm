<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    protected $table = 'sales_order';
    protected $primaryKey = 'id_so';

    protected $fillable = [
        'tanggal',
        'nama_customer',
        'status',
    ];

    public function detailSos()
    {
        return $this->hasMany(DetailSo::class, 'id_so', 'id_so');
    }
}
