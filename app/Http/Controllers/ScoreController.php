<?php

namespace App\Http\Controllers;

use App\cb_olahraga;
use App\tb_jadwal;
use App\tb_kelas;
use App\tb_pertandingan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;


class ScoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $score = tb_pertandingan::all();
        return view("admin.data_score")->with('score', $score);
    }

    public function create(){
        $jadwal = tb_jadwal::all();
        return view("admin.tambah_score")->with('jadwal', $jadwal);
    }

    public function show($id){
        $jad = tb_jadwal::find($id);
        $tim1 = $jad->kelas()->first();
        $tim2 = $jad->kelas1()->first();

        $returnJSON = [
            "jadwal"=>$jad,
            "tim1"=>$tim1,
            "tim2"=>$tim2
        ];

        return json_encode($returnJSON);
    }

    public function store(Request $request){
        $score = new tb_pertandingan();
        $score->jadwal_id = $request->input('jadwal');
        $score->tim1 = $request->input('tim1');
        $score->tim2 = $request->input('tim2');
        $score->keterangan = $request->input('keterangan');
        $score->lokasi = $request->input('lokasi');
        $score->score = $request->input('score');
        $result = $score->save();
        if ($result){
            return redirect('/tambah_score')->with(['message' => 'Berhasil Tambah Score']);
        }else{
            return redirect('/tambah_score')->with(['message' => 'Gagal Tambah Score']);
        }
    }

    public function shows($id){
        $sc = tb_pertandingan::find($id);
        return json_encode($sc);
    }
}
