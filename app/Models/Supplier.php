<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'id_supplier';

    protected $fillable = [
        'nama_supplier',
        'alamat',
        'telepon',
        'email',
    ];

    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class, 'id_supplier', 'id_supplier');
    }
}
