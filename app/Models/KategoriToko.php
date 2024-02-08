<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriToko extends Model
{
    use HasFactory;

    protected $table = 'kategori_toko';

    protected $primaryKey = 'id_kategoriToko';

    protected $fillable = [
        "nama_kategori"
    ];
}
