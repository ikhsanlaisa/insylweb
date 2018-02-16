<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_klasemen extends Model
{
    protected $table = 'tb_klasemens';
    protected $fillable = array('kelas_id', 'point');

    public function kelas(){
        return $this->belongsTo('App\tb_kelas', 'kelas_id');
    }
}
