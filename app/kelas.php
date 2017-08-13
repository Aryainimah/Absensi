<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    // protected $table = 'kelas';
    protected $fillable=['id_jurusan','nama_kelas','walikelas'];
    // protected $visible=['id_jurusan','nama_kelas','walikelas'];
    // public $timestamps=true;

    public function jurusan()
    {
    	return $this->belongsTo('App\jurusans','id_jurusan');
    }

    public function siswa()
    {
    	return $this->hasMany('App\siswa','id_kelas');
    }
}
