<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "errors-input" => $validator->errors(),
                "messages" => "Inputan error atau kosong",
                "status_code" => 422
            ], 422);
        }

        if (!Auth::attempt($request->only(["email", "password"]))) {
            return response()->json([
                "messages" => "Kombinasi email dan password tidak valid",
                "status_code" => 401
            ], 401);
        }

        $data_user = User::where("email", $request->email)->first();

        return response()->json([
            "results" => true,
            "data" => $data_user,
            "message" => "Login berhasil",
            "token" => $data_user->createToken('api-owners')->plainTextToken
        ]);
    }
}
