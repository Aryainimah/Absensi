<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class akumulasi extends Model
{
    protected $fillable = ['id_absensi','jumlah'];

    public function absensi()
    {
    	return $this->belongsTo('App\absensi','id_absensi');
    }
}