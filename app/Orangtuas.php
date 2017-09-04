<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orangtuas extends Model
{
    // protected $table = 'orangtuas';
    protected $fillable = ['nama_ortu', 'alamat','no_hp'];
    // protected $visible = ['nama_ortu', 'alamat','no_hp'];
    // public $timestamps = true;

    public function siswa()
    {
    	return $this->hasMany('App\siswa', 'id_ortu');
    }

    public function absensi()
    {
     	return $this->belongsTo('App\absensi', 'id_ortu');

    }
}

