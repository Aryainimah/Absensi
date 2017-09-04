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
class AbsensiController extends Controller
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
            ->addColumn('action',function($absensi){
                return view('datatable._action', [
                    'model'     => $absensi,
                    'form_url'  => route('absensi.destroy',$absensi->id),
                    'edit_url'  => route('absensi.edit',$absensi->id),
                    'confirm_message' => 'Yakin Ingin Menghapus ' . $absensi->id_siswa . ' ?' ]);
           })->make(true);
    }
        $html = $htmlBuilder
        ->addColumn(['data'=>'siswa.nama_siswa','name'=>'siswa.nama_siswa','title'=>'Nama Siswa'])
        ->addColumn(['data'=>'keterangan','name'=>'keterangan','title'=>'Keterangan'])
        ->addColumn(['data'=>'tgl','name'=>'tgl','title'=>'Tanggal'])
        ->addColumn(['data'=>'orangtua.no_hp','name'=>'orangtua.no_hp','title'=>'No Hp Orang Tua'])
        ->addColumn(['data'=>'action','name'=>'action','title'=>'Opsi','orderable'=>false,'searchable'=>false]);
        return view('absensi.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('absensi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'id_siswa' => 'required',
            'keterangan' => 'required',
            'tgl' => 'required',
        ]);


        $absensi = new absensi;
        $absensi->id_siswa = $request->id_siswa;
        $ortu = siswa::find($request->id_siswa);
        $absensi->id_ortu = $ortu->id_ortu;
        $absensi->keterangan = $request->keterangan;
        $absensi->tgl = $request->tgl;
        $absensi->save();
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil menyimpan $absensi->tgl"
            ]);
        return redirect()->route('absensi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit ($id)
    {
        $absensi = absensi::find($id);
        return view('absensi.edit')->with(compact('absensi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request,[
            'id_siswa' => 'required',
            'keterangan' => 'required',
            'tgl' => 'required',
        ]);

        $absensi = absensi::find($id);
        $absensi->id_siswa = $request->id_siswa;
        $ortu = siswa::find($request->id_siswa);
        $absensi->id_ortu = $ortu->id_ortu;
        $absensi->keterangan = $request->keterangan;
        $absensi->tgl = $request->tgl;
        $absensi->save();
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil menyimpan $absensi->tgl"
            ]);
        return redirect()->route('absensi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $absensi=absensi::findOrFail($id);
    $absensi->delete();
    return redirect()->route('absensi.index');    
    }
}
