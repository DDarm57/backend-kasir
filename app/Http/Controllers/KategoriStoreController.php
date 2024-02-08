<?php

namespace App\Http\Controllers;

use App\Models\KategoriToko;
use App\Models\StoreProfile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class KategoriStoreController extends Controller
{
    //
    public function index()
    {
        try {
            $kategori_store = KategoriToko::latest()->paginate(5);
            $resurlt = [
                "results" => true,
                "data" => $kategori_store,
                "messages" => "Success Get Kategori Store",
                "status_code" => 200
            ];
            return response()->json($resurlt, 200);
        } catch (\Exception $ex) {
            return response()->json(["results" => false, "message" => "Error Get Data " . $ex], 500);
        }
    }

    public function create(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "nama_kategori" => "required",
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "errors-input" => $validator->errors(),
                    "messages" => "Inputan error atau kosong",
                    "status_code" => 422
                ], 422);
            }

            $kategori_store = KategoriToko::create([
                "nama_kategori" => $request->nama_kategori
            ]);

            $data = [
                "results" => true,
                "data" => $kategori_store,
                "messages" => "Nama kategori toko berhasil di tambah",
                "status_code" => 201
            ];

            return response()->json($data, 201);
        } catch (\Exception $ex) {
            return response()->json(["results" => false, "message" => "Error Create Data " . $ex], 500);
        }
    }

    public function edit($id)
    {
        try {
            $kategori_store = KategoriToko::where("id_kategoriToko", $id)->first();
            $resurlt = [
                "results" => true,
                "data" => $kategori_store,
                "messages" => "Success Find Kategori Store",
                "status_code" => 200
            ];
            return response()->json($resurlt, 200);
        } catch (\Exception $ex) {
            return response()->json(["results" => false, "message" => "Error Find Data " . $ex], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                "nama_kategori" => "required",
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "resulst" => false,
                    "errors-input" => $validator->errors(),
                    "messages" => "Inputan error atau kosong",
                    "status_code" => 422
                ], 422);
            }

            $kategori_store = KategoriToko::where("id_KategoriToko", $id)->update([
                "nama_kategori" => $request->nama_kategori
            ]);

            $data = [
                "data" => $kategori_store,
                "messages" => "Nama kategori toko berhasil di update",
                "status_code" => 200
            ];

            return response()->json($data, 200);
        } catch (\Exception $ex) {
            return response()->json(["results" => false, "message" => "Error Update Data " . $ex], 500);
        }
    }

    public function delete($id)
    {
        try {
            $store_profile = StoreProfile::where("kategoriToko_id", $id)->first();

            if ($store_profile) {
                return response()->json([
                    "messages" => "Kategori toko gagal di hapus terdapat aktifitas data di store owners",
                    "status_code" =>  422
                ], 422);
            } else {
                $results = KategoriToko::where("id_kategoriToko", $id)->delete();

                if (!$results) {
                    return response()->json([
                        "messages" => "Kategori toko tidak ditemukan",
                        "status_code" =>  404
                    ], 404);
                } else {
                    return response()->json([
                        "messages" => "Kategori toko berhasil di hapus",
                        "status_code" =>  200
                    ], 200);
                }
            }
        } catch (\Exception $ex) {
            return response()->json(["results" => false, "message" => "Error Update Data " . $ex], 500);
        }
    }
}
