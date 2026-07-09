<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $table = 'purchase_order';
    protected $primaryKey = 'id_po';

    protected $fillable = [
        'tanggal',
        'id_supplier',
        'total',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier', 'id_supplier');
    }

    public function penerimaanBarangs()
    {
        return $this->hasMany(PenerimaanBarang::class, 'id_po', 'id_po');
    }
}
