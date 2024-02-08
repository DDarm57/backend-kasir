<?php

namespace Database\Seeders;

use App\Models\DataBarang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i < 10; $i++) {
            DB::table("data_barangs")->insert([
                "kode_barang" => "BRG" . rand(1000000, 9999999),
                "nama_barang" => Str::random(20),
                "kategori_id" => rand(1, 3),
                "harga_asli" => 10000,
                "harga_jual" => 11000,
                "stok" => rand(100, 999),
                "diskon" => 0,
                "tanggal" => date("Y-m-d"),
                "created_at" => now(),
                "updated_at" => now(),
            ]);
        }
    }
}
