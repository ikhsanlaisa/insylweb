<?php

namespace App\Http\Controllers\Api;

use App\registrasi;
use App\tb_pertandingan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiScoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    public function score(){
        $score = tb_pertandingan::all();
        return $score;
    }

    public function index()
    {
        $user = Auth::user();
        return response()->json($user);
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
