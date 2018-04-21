<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiUsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    public function index()
    {
        $user = Auth::user();
        return response()->json($user);
    }

    public function update(Request $request){
        $user = Auth::user();
        $user->nama = $request->input('nama');

    }

    public function regis(Request $request){
        $regis = new registrasi();
        $regis->profil_id = Auth::user();
        $regis->olahraga_id = $request->input('olahraga_id');
        $result = $regis->save();
        if ($result){
            return response()->json(
                [
                    'error' => false,
                    'message' => 'berhasil disimpan'
                ]
            );
        }else{
            return response()->json(
                [
                    'error' => true,
                    'message' => 'gagal disimpan'
                ]
            );
        }
    }
}
