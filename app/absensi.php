<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
    protected $fillable = ['id_siswa','keterangan','tgl'];

    public function siswa()
    {
    	return $this->belongsTo('App\siswa','id_siswa');
    }
}
