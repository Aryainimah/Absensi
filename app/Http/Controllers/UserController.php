<?php

namespace App\Http\Controllers;
use App\absensi;
use App\siswa;
use App\Orangtuas;
use App\kelas;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()){
            $absensi = absensi::with('siswa','orangtua')->get();
            return Datatables::of($absensi)
            ->make(true);
    }
        $html = $htmlBuilder
        ->addColumn(['data'=>'siswa.nama_siswa','name'=>'siswa.nama_siswa','title'=>'Nama Siswa'])
        ->addColumn(['data'=>'keterangan','name'=>'keterangan','title'=>'Keterangan'])
        ->addColumn(['data'=>'tgl','name'=>'tgl','title'=>'Tanggal'])
        ->addColumn(['data'=>'orangtua.no_hp','name'=>'orangtua.no_hp','title'=>'No Hp Orang Tua']);
        return view('user')->with(compact('html'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
