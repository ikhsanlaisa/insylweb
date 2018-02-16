<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_kelas extends Model
{
    protected $table = 'tb_kelas';
    protected $fillable = array('nama_kelas', 'foto');

    public function tb_jadwal(){
        return $this->hasMany('App\tb_jadwal', 'tim1');
    }

    public function tb_jadwal1(){
        return $this->hasMany('App\tb_jadwal', 'tim2');
    }

    public function klasemen(){
        return $this->hasMany('App\tb_klasemen', 'kelas_id');
    }

    public function pertandingan(){
        return $this->hasMany('App\tb_pertandingan', 'pemenang_id');
    }
}
