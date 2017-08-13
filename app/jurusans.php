<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jurusans extends Model
{
    //
    // protected $table = 'jurusans';
    protected $fillable = ['nama_jur'];
    // protected $visible = ['nama_jur'];
    // public $timestamps = true;

    public function kelas()
    {
    	return $this->hasMany('App\kelas','id_jurusan');
    }
}
