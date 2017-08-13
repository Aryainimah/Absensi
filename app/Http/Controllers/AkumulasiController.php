<?php

namespace App\Http\Controllers;

use App\akumulasi;
use App\absensi;
use App\siswa;
use App\Orangtuas;
use App\kelas;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class AkumulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()){
            $akumulasi = akumulasi::with('absensi')->get();
            return Datatables::of($akumulasi)
            ->addColumn('action',function($akumulasi){
                return view('datatable._action', [
                    'model'     => $akumulasi,
                    'form_url'  => route('akumulasi.destroy',$akumulasi->id),
                    'edit_url'  => route('akumulasi.edit',$akumulasi->id),
                    'confirm_message' => 'Yakin Ingin Menghapus ' . $akumulasi->id_siswa . ' ?' ]);
           })->make(true);
    }
        $html = $htmlBuilder
        ->addColumn(['data'=>'absensi.keterangan','name'=>'absensi.keterangan','title'=>'Nama Siswa'])
        ->addColumn(['data'=>'keterangan','name'=>'keterangan','title'=>'Keterangan'])
        ->addColumn(['data'=>'tgl','name'=>'tgl','title'=>'Tanggal'])
        ->addColumn(['data'=>'action','name'=>'action','title'=>'Opsi','orderable'=>false,'searchable'=>false]);
        return view('akumulasi.index')->with(compact('html'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\akumulasi  $akumulasi
     * @return \Illuminate\Http\Response
     */
    public function show(akumulasi $akumulasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\akumulasi  $akumulasi
     * @return \Illuminate\Http\Response
     */
    public function edit(akumulasi $akumulasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\akumulasi  $akumulasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, akumulasi $akumulasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\akumulasi  $akumulasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(akumulasi $akumulasi)
    {
        //
    }
}
