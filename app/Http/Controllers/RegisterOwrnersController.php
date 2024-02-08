<?php

namespace App\Http\Controllers;

use App\Models\Owners;
use App\Models\RegisterOwners;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterOwrnersController extends Controller
{
    //
    public function register(Request $request)
    {
        //users
        $name = $request->name;
        $email = $request->email;
        $password = Hash::make($request->password);
        $store_key = "OW" . date("ymd") . "DD" . date("Hi") . rand(10000, 99999);
        $role = 2;

        //owners
        $pemilik = $request->nama_pemilik;
        $phone_owners = $request->phone_owners;

        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required",
            "nama_pemilik" => "required",
            "phone_owners" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return response()->json([
                "errors-input" => $validator->errors(),
                "messages" => "Inputan error atau kosong",
                "status_code" => 422
            ], 422);
        }
        try {
            $data_users = [
                "name" => $name,
                "email" => $email,
                "password" => $password,
                "store_key" => $store_key,
                "role" => $role,
            ];
            $data_owners = [
                "nama_pemilik" => $pemilik,
                "phone_owners" => $phone_owners,
                "store_key" => $store_key,
            ];

            $registerOwner = new RegisterOwners();

            $resultsRegister = $registerOwner->saveRegister($data_users, $data_owners);

            return response()->json([
                "results" => true,
                "data" => $resultsRegister,
                "message" => "Register owner berhasil di lakukan",
                "status_code" => 201
            ], 201);
        } catch (\Exception $ex) {
            return response()->json(["results" => false, "message" => "Error Register Data " . $ex], 500);
        }
    }
}
