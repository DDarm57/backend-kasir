<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Owners extends Model
{
    use HasFactory;

    protected $table = 'owners';
    protected $primaryKey = 'id_owners';

    protected $fillable = [
        "user_id",
        "nama_pemilik",
        "phone_owners",
        "store_key",
    ];
}
