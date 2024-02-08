<?php

namespace App\Http\Controllers;

use App\Models\StoreProfile;
use Illuminate\Http\Request;

class OwnerStoreController extends Controller
{
    //
    public function index()
    {
        $storeProfile = new StoreProfile();

        try {
            $data_owners = $storeProfile->getStore();
            $resurlt = [
                "results" => true,
                "data" => $data_owners,
                "message" => "Success Get Data Owner Store"
            ];
            return response()->json($resurlt, 200);
        } catch (\Exception $ex) {
            return response()->json(["results" => false, "message" => "Error Get Data " . $ex], 500);
        }
    }
}
