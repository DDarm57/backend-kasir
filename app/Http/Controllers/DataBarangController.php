<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use Illuminate\Http\Request;

class DataBarangController extends Controller
{
    //
    public function index()
    {
        try {
            $data_barang = DataBarang::all();
            $resurlt = [
                "results" => true,
                "data" => $data_barang,
                "message" => "Success Get Data Barang"
            ];
            return response()->json($resurlt, 200);
        } catch (\Exception $ex) {
            return response()->json(["results" => false, "message" => "Error Get Data"], 500);
        }
    }
}
