<?php

namespace App\Http\Controllers;

use App\Models\Owners;
use Illuminate\Http\Request;

class DataOwnersController extends Controller
{
    //
    public function index()
    {
        try {
            $data_owners = Owners::all();
            $resurlt = [
                "results" => true,
                "data" => $data_owners,
                "message" => "Success Get Data Owners"
            ];
            return response()->json($resurlt, 200);
        } catch (\Exception $ex) {
            return response()->json(["results" => false, "message" => "Error Get Data " . $ex], 500);
        }
    }
}
