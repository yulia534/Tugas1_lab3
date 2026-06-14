<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'kode_barang',
        'nama_barang',
        'satuan',
        'harga',
    ];

    // Format harga otomatis
    public function getHargaFormattedAttribute(): string
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}