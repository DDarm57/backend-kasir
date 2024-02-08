<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;

    protected $table = "data_barang";
    protected $primaryKey = 'id_barang';

    protected $fillable = [
        "store_key",
        "kode_barang",
        "nama_barang",
        "kategori_id",
        "harga_asli",
        "harga_jual",
        "stok",
        "satuan",
        "diskon",
        "gambar",
        "deskripsi",
        "tanggal",
    ];
}
