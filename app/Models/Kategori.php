<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = "kategori_barang";

    protected $primaryKey = 'id_kategoriBarang';

    protected $fillable = [
        "user_id",
        "nama_kategori",
        "store_key",
    ];
}
