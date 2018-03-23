<?php

namespace App\Http\Controllers;

use App\cb_olahraga;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $score = cb_olahraga::all();
        return view("admin.data_score")->with('score', $score);
    }
}
