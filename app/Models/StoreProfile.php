<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StoreProfile extends Model
{
    use HasFactory;

    protected $table = 'store_profile';

    protected $primaryKey = 'id_store';

    protected $fillable = [
        "kategoriToko_id",
        "owners_id",
        "nama_toko",
        "povinsi",
        "kota",
        "kecamatan",
        "alamat_lengkap",
        "phone_store",
        "logo",
        "store_key",
    ];

    public function getStore()
    {
        $results = DB::table("store_profile")
            ->join("owners", "store_profile.owners_id", "=", "owners.id_owners")
            ->join("kategori_toko", "store_profile.kategoriToko_id", "=", "kategori_toko.id_kategoriToko")
            ->select("store_profile.*", "owners.*", "kategori_toko.*")
            ->get();

        return $results;
    }
}
